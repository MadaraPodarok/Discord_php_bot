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
            'intents' => Intents::getDefaultIntents(
                ) | Intents::GUILD_MEMBERS | Intents::GUILD_VOICE_STATES | Intents::GUILD_PRESENCES,
            'loop' => Loop::get(),
            // Понадобится для отслеживания событий участников
        ]);
    }

    public function stateEvent(): void
    {
        $this->discord->on('ready', function (Discord $ds) {
            echo "Bot is ready!", PHP_EOL;


//            /** @var Activity $activity */
//            $activity = $ds->factory(Activity::class, [
//                'name' => '!help',
//                'type' => Activity::TYPE_LISTENING
//            ]);
//            $ds->updatePresence($activity);

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

            $ds->on(
                Event::STAGE_INSTANCE_UPDATE,
                function (StageInstance $stageInstance, Discord $discord, ?StageInstance $oldStageInstance) {
                    var_dump([
                        '$stageInstanceID' => $stageInstance->id
                    ]);
                }
            );

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

                    if (is_null($oldChannelID) && !is_null($newChannelID)) {
                        echo 'Зашел', PHP_EOL;
                        # Если user заходит/выходит в IT - ничего не делаем
                        if ($newChannelID === self::voiceIT) {
                            echo $userID . ' зашел в IT', PHP_EOL;
                            return;
                        }
                        Message::send($userID, $ds, ['action' => 1]);
                    } elseif (is_null($newChannelID)) {
                        echo 'Вышел', PHP_EOL;
                        Message::send($userID, $ds, ['action' => 0]);
                    }

                    if ($oldChannelID === self::voiceIT && !is_null($newChannelID)) {
                        echo $userID . ' вышел из IT', PHP_EOL;
                        return;
                    }

                    $members = $newVsUpdate->channel->members;

                    $membersChannelID = [];
                    if ($members) {
                        /** @var VoiceStateUpdate $member */
                        foreach ($members as $member) {
                            $membersChannelID[] = $member->user_id;
                        }
                    }
                    if ($membersChannelID) {
                        var_dump([
                            '$membersChannelID' => $membersChannelID
                        ]);
                        #Damir Egor
                        if (in_array('386154772568473610', $membersChannelID, true) &&
                            in_array('274889678950367232', $membersChannelID, true)) {
                            Message::sendParty($membersChannelID, $ds, ['gameParty' => 'War Thunder']);
                        }
                        # Damir Egor Anast
                        if (in_array('386154772568473610', $membersChannelID, true) &&
                            in_array('274889678950367232', $membersChannelID, true) &&
                            in_array('911741107061276725', $membersChannelID, true)) {
                            Message::sendParty($membersChannelID, $ds, ['gameParty' => 'Dota 2']);
                        }
                        # Timur Sergei Damir
                        if (in_array('248406110019518464', $membersChannelID, true) &&
                            in_array('258640185246351360', $membersChannelID, true) &&
                            in_array('386154772568473610', $membersChannelID, true)) {
                            Message::sendParty($membersChannelID, $ds, ['gameParty' => 'The Sims']);
                        }

                        # Ivan Maxim Alex Chingiz
                        if (in_array('262446334441684993', $membersChannelID, true) &&
                            in_array('726837943741972570', $membersChannelID, true) &&
                            in_array('276034798009581569', $membersChannelID, true) &&
                            in_array('268277651599261697', $membersChannelID, true)) {
                            Message::sendParty($membersChannelID, $ds, ['gameParty' => 'Counter-Strike']);
                        }
                    }
                }
            );
        });
        $this->discord->run();
    }
}