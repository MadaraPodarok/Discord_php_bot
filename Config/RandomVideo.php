<?php

namespace Config;

use Log\Log;

class RandomVideo
{
    private const string PAPICH_ALO = __DIR__ . '/../Video/PAPICH_ALO.mp4';
    private const string PAPICH_YA_NE_VERU = __DIR__ . '/../Video/PAPICH_YA_NE_VERU.mp4';
    private const string Papich_Furry_na_meste = __DIR__ . '/../Video/FURIEBI_NA_MESTE.mp4';

    public static function video(string $name, array $options): string
    {
        switch ($name) {
            case 'Damir':
                return self::nameDamir($options);
            case 'Chingiz':
                return self::nameChingiz($options);
            case 'Alex':
                return self::nameAlex($options);
            case 'Sergei_Piter':
                return self::nameSergeiPiter($options);
//            case 'Egor':
//                return self::nameEgor($options);
//            case 'Anastasiya':
//                return self::nameAnastasiya($options);
//            case 'Timur':
//                return self::nameTimur($options);
//            case 'Askar':
//                return self::nameAskar($options);
//            case 'Sergei':
//                return self::nameSergei($options);
//            case 'Ivan':
//                return self::nameIvan($options);
//            case 'Maxim':
//                return self::nameMaxim($options);
            case 'Tester':
                return '';
        }
        Log::sendLog('error', 'Кого то забыли? ' . $name);
        return '';
    }

    private static function nameDamir(array $options): string
    {
        $action = $options['action'] ?? null;

//        if ($action === 0) {
//            $listUrl = [
//                self::DUMAET_THE_DEEP,
//                self::USHEL_SRAT,
//            ];
//            return $listUrl[array_rand($listUrl)];
//        }
        if ($action === 1) {
            $listUrl = [
                self::PAPICH_YA_NE_VERU,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;



        $gameParty = $options['gameParty'] ?? null;

        return '';
    }

    private static function nameChingiz(array $options): string
    {
        $action = $options['action'] ?? null;

        if ($action === 1) {
            $listUrl = [
                self::PAPICH_ALO,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        $gameParty = $options['gameParty'] ?? null;

        return '';
    }

    private static function nameAlex(array $options): string
    {
        $action = $options['action'] ?? null;

        if ($action === 1) {
            $listUrl = [
                self::PAPICH_YA_NE_VERU,
                self::PAPICH_ALO,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        $gameParty = $options['gameParty'] ?? null;

        return '';
    }

    private static function nameSergeiPiter(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 1) {
            $listUrl = [
                self::Papich_Furry_na_meste
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Furry')) {
            return RandomVideo::video('Sergei_Piter', $options);
        }

        return '';
    }
}