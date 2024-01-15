<?php

namespace Config;

use Log\Log;

class Roles
{
    public static function roleByUserID(string $userID): string
    {
        return match ($userID) {
            '386154772568473610' => "<@386154772568473610>",
            '276034798009581569' => "<@276034798009581569>",
            '274889678950367232' => "<@274889678950367232>",
            '268277651599261697' => "<@268277651599261697>",
            '248406110019518464' => "<@248406110019518464>",
            '781546965112586271' => "<@781546965112586271>",
            '911741107061276725' => "<@911741107061276725>",
            default => "<@368107244199346176>",
        };
    }

    public static function nameByUserID(string $userID): string
    {
        switch ($userID) {
            case '386154772568473610':
                return "Damir";
            case '276034798009581569':
                return "Chingiz";
            case '274889678950367232':
                return "Egor";
            case '268277651599261697':
                return "Alex";
            case '248406110019518464':
                return "Timur";
            case '781546965112586271':
                return "Igor";
            case '911741107061276725':
                return "Anastasiya";
            case '283618794272980992':
                return 'Askar';
            case '726837943741972570':
                return 'Maxim';
            case '262446334441684993':
                return 'Ivan';
            case '258640185246351360':
                return 'Sergei';
            case '368107244199346176';
                return "Tester";
        }
//        Log::sendLog('error', 'Чей userID? ' . $userID);
        return '';
    }
}
