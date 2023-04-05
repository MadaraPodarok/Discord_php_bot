<?php

namespace Config;

use Discord\Discord;
use Discord\Exceptions\IntentException;
use Discord\Parts\Channel\StageInstance;
use Discord\Parts\User\Activity;
use Discord\Parts\User\Member;
use Discord\Parts\WebSockets\PresenceUpdate;
use Discord\Parts\WebSockets\VoiceServerUpdate;
use Discord\Parts\WebSockets\VoiceStateUpdate;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use React\EventLoop\Loop;

class RunBot
{
    private Discord $discord;

    private const voiceIT = '1034416760415342684';

    /**
     * @throws IntentException
     */
    public function __construct()
    {
        $this->discord = new Discord([
            'token' => $_ENV['DISCORD_TOKEN'],
            'loadAllMembers' => true,
            'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::GUILD_VOICE_STATES | Intents::GUILD_PRESENCES,
            'loop' => Loop::get(),
            // Понадобится для отслеживания событий участников
        ]);
    }

    public function stateEvent(): void
    {
        $this->discord->on('ready', function (Discord $ds) {
            echo "Bot is ready!", PHP_EOL;


            /** @var Activity $activity */
            $activity = $ds->factory(Activity::class, [
                'name' => '!help',
                'type' => Activity::TYPE_LISTENING
            ]);
            $ds->updatePresence($activity);

            $ds->on(Event::GUILD_MEMBER_UPDATE, static function (Member $member, Discord $discord, ?Member $oldMember) {
                var_dump([
                    '$memberID' => $member->id
                ]);
            });

            $ds->on(Event::PRESENCE_UPDATE, static function (PresenceUpdate $presence, Discord $discord) {

                $activityGameName = $presence->game->name;

                $userID = $presence->member->id;
                Message::send($userID, $discord, [
                    'game' => $activityGameName,
                ]);
            });

            $ds->on(Event::STAGE_INSTANCE_UPDATE, function (StageInstance $stageInstance, Discord $discord, ?StageInstance $oldStageInstance) {
                var_dump([
                    '$stageInstanceID' => $stageInstance->id
                ]);
            });

            $ds->on(Event::VOICE_SERVER_UPDATE, function (VoiceServerUpdate $guild, Discord $discord) {
                var_dump([
                    '$guildID' => $guild->guild->id
                ]);
            });

            $ds->on(
                Event::VOICE_STATE_UPDATE,
                static function (VoiceStateUpdate $newVsUpdate, Discord $ds, VoiceStateUpdate $oldVsUpdate = null) {

                    $newChannelID = $newVsUpdate->channel_id ?? null;
                    $oldChannelID = $oldVsUpdate->channel_id ?? null;
                    $userID = $newVsUpdate->member->id;

                    var_dump([
                        '$newChannelID' => $newChannelID,
                        '$oldChannelID' => $oldChannelID,
                    ]);

                    # Если user заходит/выходит в IT - ничего не делаем
//                    if ($newChannelID === self::voiceIT) {
//                        echo $userID . ' зашел в IT', PHP_EOL;
//                        return;
//                    }

                    if (is_null($oldChannelID) && !is_null($newChannelID)) {
                        echo 'Зашел', PHP_EOL;
                        Message::send($userID, $ds, ['action' => 1]);
                    } elseif (is_null($newChannelID)) {
                        echo 'Вышел', PHP_EOL;
                        Message::send($userID, $ds, ['action' => 0]);
                    } elseif ($oldChannelID && $newChannelID) {
                        echo 'Перешел с другого канала', PHP_EOL;
                        Message::send($userID, $ds, ['action' => 0]);
                        $newVsUpdate->channel_id = null;
                        $oldVsUpdate->channel_id = null;
                    }
                }
            );
        });
        $this->discord->run();
    }
}