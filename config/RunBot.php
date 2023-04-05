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

                $userID = $discord->user->id;
                if (str_contains($activityGameName, 'Launcher')) {
                    Message::send($userID, $discord);
                }
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
                static function (VoiceStateUpdate $newVsUpdate, Discord $ds, ?VoiceStateUpdate $oldVsUpdate = null) {

//                    $newChannelID = $newVsUpdate->channel_id ?? null;
//                    $oldChannelID = $oldVsUpdate->channel_id ?? null;
//
//                    # Если user заходит/выходит в IT - ничего не делаем
//                    if ($newChannelID === self::voiceIT) {
//                        echo 'User зашел в IT', PHP_EOL;
//                        return;
//                    }
//
//
//                    $userID = $newVsUpdate->user->id;
//
////                    var_dump([
////                        '$newChannelID' => $newChannelID,
////                        '$oldChannelID' => $oldChannelID
////                    ]);
////
////                    # User зашел в канал
////                    # для тестера $vSUpdate->user->id === '368107244199346176'
////                    if (!is_null($newChannelID)) {
////                        echo 'Зашел', PHP_EOL;
////                        Message::sendVSUpdate($userID, $newVsUpdate);
////                    }
////
////                    # Юзер вышел из канала
////                    if (is_null($newChannelID) && !is_null($oldChannelID)) {
////                        echo 'Вышел', PHP_EOL;
////                        Message::sendVSUpdate($userID, $oldVsUpdate);
////                    }
                }
            );

//            $ds->on(Event::USER_UPDATE, static function (User $user, Discord $discord, ?User $oldUser) {
//                var_dump([
//                    'userTest' => [
//                        $user->id
//                    ]
//                ]);
//            });
        });

        $this->discord->run();
    }
}

#var_dump($_ENV['DISCORD_TOKEN']);die();


