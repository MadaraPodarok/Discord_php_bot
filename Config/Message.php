<?php

namespace Config;

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Exceptions\FileNotFoundException;
use Discord\Http\Exceptions\NoPermissionsException;
use Discord\Parts\Channel\Channel;

class Message
{
    private const string channelMessageChat = '274886275176202240';
    private const string channelMessageTest = '1092737067252990002';

    /**
     * @throws NoPermissionsException
     * @throws FileNotFoundException
     */
    public static function send(string $userID, Discord $discord, array $options): void
    {
        $name = Roles::nameByUserID($userID);

        if (empty($name)) {
            return;
        }

        if (getenv('APP_ENV') === 'production') {
            $channelMessage = self::channelMessageChat;
        } else {
            $channelMessage = self::channelMessageTest;
        }

        /** @var Channel $channel */
        $channel = $discord->getChannel($channelMessage);

        $role = Roles::roleByUserID($userID);
        $gif = RandomGif::gif($name, $options);
        if (empty($gif)) {
            return;
        }
        $builder = MessageBuilder::new();

        $channel->sendMessage(
            $builder
                ->setContent($role . PHP_EOL)
                ->addFile($gif)
        );
    }

    /**
     * @throws FileNotFoundException
     * @throws NoPermissionsException
     */
    public static function sendParty(array $usersID, Discord $discord, array $options): void
    {
        if (getenv('APP_ENV') === 'production') {
            $channelMessage = self::channelMessageChat;
        } else {
            $channelMessage = self::channelMessageTest;
        }

        foreach ($usersID as $userID) {
            $name = Roles::nameByUserID($userID);
            if (empty($name)) {
                return;
            }

            /** @var Channel $channel */
            $channel = $discord->getChannel($channelMessage);

            $role = Roles::roleByUserID($userID);
            $gif = RandomGif::gif($name, $options);
            if (empty($gif)) {
                $gif = RandomGif::DUMAET_THE_DEEP;
            }
            $builder = MessageBuilder::new();

            $channel->sendMessage(
                $builder
                    ->setContent($role . PHP_EOL)
                    ->addFile($gif)
            );
        }
    }
}