<?php

namespace Config;

use Discord\Builders\MessageBuilder;
use Discord\Parts\WebSockets\VoiceStateUpdate;

class Message
{
    public static function send(string $userID, ?VoiceStateUpdate $voiceStateUpdate = null): void
    {
        if (is_null($voiceStateUpdate)) {
            throw new \RuntimeException('$voiceStateUpdate не найден');
        }
        $role = Roles::roleByUserID($userID);
        $name = Roles::nameByUserID($userID);


        $builder = MessageBuilder::new();

        $channel = $voiceStateUpdate->channel;
        # Чат куда приходит письмо
        $channel->id = '274886275176202240';
        $url = RandomGif::url($name);
        $channel->sendMessage($builder->setContent($role . ' ' . $url));
    }
}