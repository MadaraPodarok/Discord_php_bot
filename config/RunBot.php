<?php

namespace Config;

use Discord\Discord;
use Discord\Exceptions\IntentException;
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
            'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::GUILD_VOICE_STATES,
            'loop' => Loop::get(),
            // Понадобится для отслеживания событий участников
        ]);
    }

    public function stateEvent(): void
    {
        $this->discord->on('ready', function (Discord $ds) {
            echo "Bot is ready!", PHP_EOL;

            $ds->on(
                Event::VOICE_STATE_UPDATE,
                static function (VoiceStateUpdate $newVsUpdate, Discord $ds, ?VoiceStateUpdate $oldVsUpdate = null) {

                    $newChannelID = $newVsUpdate->channel_id ?? null;
                    $oldChannelID = $oldVsUpdate->channel_id ?? null;

                    # Если user заходит/выходит в IT - ничего не делаем
                    if ($newChannelID === self::voiceIT) {
                        echo 'User зашел в IT', PHP_EOL;
                        return;
                    }


                    $userID = $newVsUpdate->user->id;

                    var_dump([
                        '$newChannelID' => $newChannelID,
                        '$oldChannelID' => $oldChannelID
                    ]);

                    # User зашел в канал
                    # для тестера $vSUpdate->user->id === '368107244199346176'
                    if (!is_null($newChannelID)) {
                        echo 'Зашел', PHP_EOL;
                        Message::send($userID, $newVsUpdate);
                    }

                    # Юзер вышел из канала
                    if (is_null($newChannelID) && !is_null($oldChannelID)) {
                        echo 'Вышел', PHP_EOL;
                        Message::send($userID, $oldVsUpdate);
                    }

//                    var_dump(
//                        [
//                            [
//                                'channelWorkID: ' => $newVsUpdate->channel_id,
//                                'userID' => $newVsUpdate->user->id,
//                                '$oldStateTest' => [
//                                    'oldChannelID' => $oldVsUpdate->channel_id ?? null,
//                                ]
//                            ],
//                            [
//                                'channel' => $newVsUpdate->channel
//                            ],
//                            [
//                                'Активность пользователя' => $newVsUpdate->member->activities,
//                            ],
//
//                        ]
//                    );
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


