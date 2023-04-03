<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Parts\WebSockets\VoiceStateUpdate;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use React\EventLoop\Loop;

$ds = new Discord([
    'token' => $_ENV['DISCORD_TOKEN'],
    'loadAllMembers' => true,
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::GUILD_VOICE_STATES,
    'loop' => Loop::get(),
    // Понадобится для отслеживания событий участников
]);

$ds->on('init', static function (Discord $ds) {
    $ds->on(Event::MESSAGE_CREATE, static function (Message $message, Discord $ds) {
        // ... handle message sent
    });
    $ds->on(Event::VOICE_STATE_UPDATE, static function (VoiceStateUpdate $vSUpdate, Discord $ds) {
        print_r('channelWorkID: ' . $vSUpdate->channel_id);
        # User и войс канал куда заходит чел IT
        if ($vSUpdate->user->id === '368107244199346176' && $vSUpdate->channel_id === '1034416760415342684') {
            $builder = MessageBuilder::new();
            $channel = $vSUpdate->channel;
            # Чат куда приходит письмо
            $channel->id = '274886275176202240';
            $channel->sendMessage($builder->setContent('<@368107244199346176> bruh'));
        }
    });
});

$ds->run();