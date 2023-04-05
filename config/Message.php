<?php

namespace Config;

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Exceptions\FileNotFoundException;
use Discord\Http\Exceptions\NoPermissionsException;
use Discord\Parts\Channel\Channel;
use Discord\Parts\Embed\Embed;

class Message
{
    private const channelMessageChat = '274886275176202240';
    private const channelMessageTest = '1092737067252990002';

    /**
     * @throws NoPermissionsException
     * @throws FileNotFoundException
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
        $gif = RandomGif::gif($name, $options);

        $builder = MessageBuilder::new();

        $channel->sendMessage(
            $builder
                ->setContent($role . PHP_EOL)
                ->addFile($gif)
        );
    }
}