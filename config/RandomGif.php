<?php

namespace Config;

use RuntimeException;

class RandomGif
{
    private const DAMIR_ZASHEL_V_TLOU_GIF = __DIR__ . '/../Gif/DAMIR_ZASHEL_V_TLOU_GIF.gif';
    private const KOGO_TI_VIBERESH_GIF = __DIR__ . '/../Gif/KOGO_TI_VIBERESH_GIF.gif';
    private const YA_VERNULSYA_V_STROI_GIF = __DIR__ . '/../Gif/YA_VERNULSYA_V_STROI_GIF.gif';
    private const WOW_HOMELANDER = __DIR__ . '/../Gif/WOW_HOMELANDER.gif';
    private const NE_PON_HOMELANDER = __DIR__ . '/../Gif/NE_PON_HOMELANDER.gif';

    private const DUMAET_THE_DEEP = __DIR__ . '/../Gif/DUMAET_THE_DEEP.gif';
    private const FIFA_TIME = __DIR__ . '/../Gif/FIFA_TIME.gif';
    private const PLUS_SOCIAL_CREDIT = __DIR__ . '/../Gif/PLUS_SOCIAL_CREDIT.gif';
    private const SOSAT_THE_DEEP = __DIR__ . '/../Gif/SOSAT_THE_DEEP.gif';
    private const IGRAU_V_DOTY_NE_MESHAI = __DIR__ . '/../Gif/IGRAU_V_DOTY_NE_MESHAI.gif';

    private const UDALYAU_GENSHIN = __DIR__ . '/../Gif/UDALYAU_GENSHIN.gif';
    private const EGOR_GO_DOTKY = __DIR__ . '/../Gif/EGOR_GO_DOTKY.gif';
    private const SMOTRU_NA_PIDOROV = __DIR__ . '/../Gif/SMOTRU_NA_PIDOROV.gif';
    private const OOF_HOMELANDER = __DIR__ . '/../Gif/OOF_HOMELANDER.gif';
    private const POLEGCHE_HOMELANDER = __DIR__ . '/../Gif/POLEGCHE_HOMELANDER.gif';

    private const YA_VERNULSYA_THE_DEEP = __DIR__ . '/../Gif/YA_VERNULSYA_THE_DEEP.gif';
    private const YA_PROSHAU_TEBYA = __DIR__ . '/../Gif/YA_PROSHAU_TEBYA.gif';
    private const DAYNI_OBSHII_SBOR = __DIR__ . '/../Gif/DAYNI_OBSHII_SBOR.gif';
    private const KOMANDA_V_SBORE = __DIR__ . '/../Gif/KOMANDA_V_SBORE.gif';
    private const FREE_1 = __DIR__ . '/../Gif/FREE_1.gif';
    private const USHEL_SRAT = __DIR__ . '/../Gif/USHEL_SRAT.gif';
    private const EGOR_AND_CHINGIZ = __DIR__ . '/../Gif/EGOR_AND_CHINGIZ.gif';


    public static function gif(string $name, array $options): string
    {
        switch ($name) {
            case 'Damir':
                return self::nameDamir($options);
            case 'Chingiz':
                return self::nameChingiz($options);
            case 'Alex':
                return self::nameChingiz($options);
            case 'Egor':
                return self::nameEgor($options);
            case 'Anastasiya':
                return self::nameAnastasiya($options);
            case 'Timur':
                return self::nameTimur($options);
            case 'Askar':
                return self::nameAskar($options);
            case 'Tester':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return self::FREE_1;
                    case 2:
                        return self::EGOR_AND_CHINGIZ;
                }
                break;
        }
        throw new RuntimeException('Кого то забыли? ' . $name);
    }

    private static function nameDamir(array $options): string
    {
        $action = $options['action'] ?? null;

        if ($action === 0) {
            $listUrl = [
                self::KOGO_TI_VIBERESH_GIF,
                self::USHEL_SRAT,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::YA_VERNULSYA_V_STROI_GIF,
                self::WOW_HOMELANDER,
                self::NE_PON_HOMELANDER,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'The Last Of Us')) {
            return self::DAMIR_ZASHEL_V_TLOU_GIF;
        }
        if (str_contains($game, 'War Thunder')) {
            return self::SMOTRU_NA_PIDOROV;
        }
        throw new RuntimeException('Дамир куда то зашел? , ' . 'action: ' . $action . ' или game: ' . $game);
    }

    private static function nameChingiz(array $options): string
    {
        $action = $options['action'];
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::FIFA_TIME,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'];

        if (str_contains($game, 'Counter-Strike')) {
            return self::PLUS_SOCIAL_CREDIT;
        }
        throw new RuntimeException('Чингиз куда то зашел? , ' . 'action: ' . $action . ' или game: ' . $game);
    }

    private static function nameEgor(array $options): string
    {
        $action = $options['action'];
        if ($action === 0) {
            $listUrl = [
                self::SOSAT_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::YA_VERNULSYA_V_STROI_GIF,
                self::WOW_HOMELANDER,
                self::NE_PON_HOMELANDER,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'];

        if (str_contains($game, 'Dota 2')) {
            return self::IGRAU_V_DOTY_NE_MESHAI;
        }
        throw new RuntimeException('Егор куда то зашел? , ' . 'action: ' . $action . ' или game: ' . $game);
    }

    private static function nameAnastasiya(array $options): string
    {
        $action = $options['action'];
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::UDALYAU_GENSHIN,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'];

        if (str_contains($game, 'Dota 2')) {
            return self::EGOR_GO_DOTKY;
        }
        throw new RuntimeException('Анастасия куда то зашла? , ' . 'action: ' . $action . ' или game: ' . $game);
    }

    private static function nameTimur(array $options): string
    {
        $action = $options['action'];
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::SMOTRU_NA_PIDOROV,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'];

        if (str_contains($game, 'The Sims')) {
            return self::OOF_HOMELANDER;
        }
        throw new RuntimeException('Тимур куда то зашел? , ' . 'action: ' . $action . ' или game: ' . $game);
    }

    private static function nameAskar(array $options): string
    {
        $action = $options['action'];
        if ($action === 0) {
            $listUrl = [
                self::POLEGCHE_HOMELANDER,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::YA_VERNULSYA_THE_DEEP,
                self::YA_PROSHAU_TEBYA,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'];

        if (str_contains($game, 'Dota 2')) {
            return self::IGRAU_V_DOTY_NE_MESHAI;
        }
        throw new RuntimeException('Аскар куда то зашел? , ' . 'action: ' . $action . ' или game: ' . $game);
    }
}