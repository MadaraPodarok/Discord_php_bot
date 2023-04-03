<?php

require __DIR__ . '/vendor/autoload.php';


use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Discord\Parts\User\Member;
use Discord\Parts\Channel\Message;

$ds = new Discord([
    'token' => $_ENV['DISCORD_TOKEN'],
    // Токен, который мы сгенерировали ранее
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS,
    // Понадобится для отслеживания событий участников
]);

$ds->on(Event::VOICE_STATE_UPDATE, static function (Member $member, Message $msg, Discord $ds) {
    $msg->reply('Привет!, ' . $msg->author->username);
});

$ds->on(Event::MESSAGE_CREATE, static function (Message $msg, Discord $ds) {
    // Тут будем обрабатывать входящие
    if ($msg->content === '/test') {
        $msg->reply('Привет, ' . $msg->author->username);
    } elseif (str_contains($msg->content, 'админ лох')) {
        $msg->member->ban(1, 'reason');
    }
});

$ds->run();