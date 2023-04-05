<?php

namespace Config;

class Roles
{
    public static function roleByUserID(string $userID): string
    {
        switch ($userID) {
            case '386154772568473610':
                return "<@386154772568473610>";
            case '276034798009581569':
                return "<@276034798009581569>";
            case '274889678950367232':
                return "<@274889678950367232>";
            case '268277651599261697':
                return "<@268277651599261697>";
            case '248406110019518464':
                return "<@248406110019518464>";
            case '781546965112586271':
                return "<@781546965112586271>";
            case '911741107061276725':
                return "<@911741107061276725>";
            case '368107244199346176';
            default:
                return "<@368107244199346176>";
        }
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
        throw new \RuntimeException('Чей userID? ' . $userID);
    }
}
