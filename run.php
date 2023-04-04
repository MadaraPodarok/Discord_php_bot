<?php

require __DIR__ . '/vendor/autoload.php';

use Config\Message;
use Config\RandomGif;
use Config\Roles;
use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\User\User;
use Discord\Parts\WebSockets\VoiceStateUpdate;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use React\EventLoop\Loop;

#var_dump($_ENV['DISCORD_TOKEN']);die();
$ds = new Discord([
    'token' => $_ENV['DISCORD_TOKEN'],
    'loadAllMembers' => true,
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::GUILD_VOICE_STATES,
    'loop' => Loop::get(),
    // Понадобится для отслеживания событий участников
]);

$ds->on('ready', function (Discord $ds) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
//    $ds->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
//        echo "{$message->author->username}: {$message->content}", PHP_EOL;
//        // Note: MESSAGE_CONTENT intent must be enabled to get the content if the bot is not mentioned/DMed.
//    });
    $ds->on(Event::VOICE_STATE_UPDATE, static function (VoiceStateUpdate $newVsUpdate, Discord $ds, ?VoiceStateUpdate $oldVsUpdate = null) {

        $newChannelID = $newVsUpdate->channel_id ?? null;
        $oldChannelID = $oldVsUpdate->channel_id ?? null;

        # Если user заходит/выходит в IT - ничего не делаем
        if ($newChannelID === '1034416760415342684' || $oldChannelID === '1034416760415342684') {
            echo 'User зашел в IT';
            return;
        }

        $userID = $newVsUpdate->user->id;

        # User зашел в канал
        # для тестера $vSUpdate->user->id === '368107244199346176'
        if (!is_null($newChannelID) && is_null($oldChannelID)) {
            Message::send($userID, $newVsUpdate);
        }

        # Юзер вышел из канала
        if (is_null($newChannelID) && !is_null($oldChannelID)) {
            Message::send($userID, $oldVsUpdate);
        }

//        var_dump(
//            [
//                [
//                    'channelWorkID: ' => $vSUpdate->channel_id,
//                    'userID' => $vSUpdate->user->id,
//                    '$oldStateTest' => [
//                        'oldChannelID' => $oldState->channel_id ?? null,
//                    ]
//                ],
////                [
////                    'getUpdatableAttributes' => $vSUpdate->getUpdatableAttributes(),
////                    'getCreatableAttributes' => $vSUpdate->getCreatableAttributes(),
////                    'getRepositoryAttributes' => $vSUpdate->getRepositoryAttributes(),
////                ],
//                [
//                    'deaf' => $vSUpdate->deaf,
//                    'self_deaf' => $vSUpdate->self_deaf,
//                    'mute' => $vSUpdate->mute,
//                    'self_mute' => $vSUpdate->self_mute,
//                    'self_stream' => $vSUpdate->self_stream,
//                    'self_video' => $vSUpdate->self_video,
//                    'suppress' => $vSUpdate->suppress,
//                ],
////                [
////                    'channel' => $vSUpdate->channel
////                ],
//                [
//                    'Активность пользователя' => $vSUpdate->member->activities,
//                ],
//
//            ]
//        );

    });

    $ds->on(Event::USER_UPDATE, static function (User $user, Discord $discord, ?User $oldUser) {
        var_dump([
            'userTest' => [
                $user->id
            ]
        ]);
    });
});

$ds->run();