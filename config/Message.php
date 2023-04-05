<?php

namespace Config;

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Http\Exceptions\NoPermissionsException;
use Discord\Parts\Channel\Channel;

class Message
{
    private const channelMessageChat = '274886275176202240';
    private const channelMessageTest = '1092737067252990002';

    /**
     * @throws NoPermissionsException
     */
    public static function send(string $userID, Discord $discord, array $options): void
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
        $url = RandomGif::url($name, $options);

        $builder = MessageBuilder::new();
        $channel->sendMessage($builder->setContent($role . PHP_EOL . $url));
    }
}