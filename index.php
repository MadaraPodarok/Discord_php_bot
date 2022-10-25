<?php

require __DIR__ . '/vendor/autoload.php';


use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Discord\Parts\User\Member;
use Discord\Parts\Channel\Message;

$ds = new Discord([
    'token' => 'MTAzNDQyOTg2ODM5MTI3NjY2NA.GBvfR1.2RUDp7TzrTwRlRIVSN4JSrQaFZ-U3gRru0FdR8',
    // Токен, который мы сгенерировали ранее
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS,
    // Понадобится для отслеживания событий участников
]);

$ds->on('ready', static function ($ds) {
    // Тут продолжим писать код

});

$ds->on(Event::MESSAGE_CREATE, static function (Message $msg, Discord $ds) {
    // Тут будем обрабатывать входящие
    if ($msg->content === '/test') {
        $msg->reply('Привет, ' . $msg->author->username);
    } elseif (str_contains($msg->content, 'админ лох')) {
        $msg->member->ban(1, 'reason');
    }
});

$ds->on(Event::GUILD_MEMBER_ADD, static function (Member $member, Discord $ds) {
    // Тут продолжим писать код

});

$ds->run();