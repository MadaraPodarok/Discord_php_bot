<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Parts\WebSockets\VoiceStateUpdate;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Enum\RoleUser;
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
    $ds->on(Event::VOICE_STATE_UPDATE, static function (VoiceStateUpdate $vSUpdate, Discord $ds) {
        var_dump(
            [
                'channelWorkID: ' => $vSUpdate->channel_id,
                '!is_null?' => !is_null($vSUpdate->channel_id)
            ]
        );
        $userID = $vSUpdate->user->id;

        $role = Roles::roleByUserID($userID);
        $name = RoleUser::from($userID);



        # User и войс канал куда заходит чел IT
        if ($vSUpdate->user->id === '368107244199346176' && !is_null($vSUpdate->channel_id) && $vSUpdate->channel_id !== '1034416760415342684') {
            $builder = MessageBuilder::new();
            $channel = $vSUpdate->channel;
            # Чат куда приходит письмо
            $channel->id = '274886275176202240';
            $url = RandomGif::url($name->name);
            $channel->sendMessage($builder->setContent($role . $url));
        }
    });
});

$ds->run();