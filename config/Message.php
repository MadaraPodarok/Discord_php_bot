<?php

namespace Config;

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Http\Exceptions\NoPermissionsException;
use Discord\Parts\Channel\Channel;
use Discord\Parts\WebSockets\VoiceStateUpdate;
use RuntimeException;

class Message
{
    private const channelMessageChat = '274886275176202240';
    private const channelMessageTest = '1092737067252990002';

    /**
     * @throws NoPermissionsException
     */
    public static function send(string $userID, Discord $discord): void
    {
        if (getenv('APP_ENV') === 'production') {
            $channelMessage = self::channelMessageChat;
        } else {
            $channelMessage = self::channelMessageTest;
        }

        /** @var Channel $channel */
        $channel = $discord->getChannel($channelMessage);

        $role = Roles::roleByUserID($userID);
        $name = Roles::nameByUserID($userID);
        $url = RandomGif::url($name);

        $builder = MessageBuilder::new();
        $channel->sendMessage($builder->setContent($role . ' ' . $url));
    }


//    /**
//     * @throws NoPermissionsException
//     */
//    public static function sendVSUpdate(string $userID, ?VoiceStateUpdate $voiceStateUpdate = null): void
//    {
//        if (is_null($voiceStateUpdate)) {
//            throw new RuntimeException('$voiceStateUpdate не найден');
//        }
//        $role = Roles::roleByUserID($userID);
//        $name = Roles::nameByUserID($userID);
//
//
//        $builder = MessageBuilder::new();
//
//        $channel = $voiceStateUpdate->channel;
//
//        if (getenv('APP_ENV') === 'production') {
//            $channelMessage = self::channelMessageChat;
//        } else {
//            $channelMessage = self::channelMessageTest;
//        }
//
//        # Чат куда приходит письмо
//        $channel->id = $channelMessage;
//        $url = RandomGif::url($name);
//        $channel->sendMessage($builder->setContent($role . ' ' . $url));
//    }
//
//    public static function sendActivityGame(string $userID): void
//    {
//        $role = Roles::roleByUserID($userID);
//        $name = Roles::nameByUserID($userID);
//        $url = RandomGif::url($name);
//
//        $builder = MessageBuilder::new();
//        $content = $builder->setContent($role . ' ' . $url);
//    }
}