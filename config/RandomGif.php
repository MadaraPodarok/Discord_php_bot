<?php

namespace Config;

use RuntimeException;

class RandomGif
{
    private const DAMIR_ZASHEL_V_TLOU_GIF = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093155187738284102/tlou.gif';
    private const KOGO_TI_VIBERESH_GIF = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093156213434359888/farcry3.gif';
    private const YA_VERNULSYA_V_STROI_GIF = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093155320370577459/a3d747a038e5af0e.gif';
    private const WOW_HOMELANDER = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093155463803174942/wow-homelander.gif';
    private const NE_PON_HOMELANDER = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093156109751160932/homelander-the-boys_1.gif';
    private const DUMAET_THE_DEEP = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159442826145842/the-boys-the-deep.gif';
    private const FIFA_TIME = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149053128294470/fifa-fifa-time.gif';
    private const PLUS_SOCIAL_CREDIT = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159154853609623/socialka-papich.gif';
    private const SOSAT_THE_DEEP = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149361493528587/blowjob-the-deep.gif';
    private const IGRAU_V_DOTY_NE_MESHAI = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149473124913192/dota-players.gif';
    private const UDALYAU_GENSHIN = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150844330967060/-.gif';
    private const EGOR_GO_DOTKY = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149848150224976/dota2-egor.gif';
    private const SMOTRU_NA_PIDOROV = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150058561679380/the-boys-jensen-ackles.gif';
    private const OOF_HOMELANDER = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159726759563345/oof-homelander.gif';
    private const POLEGCHE_HOMELANDER = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150252086866000/aronanto-homelander.gif';
    private const YA_VERNULSYA_THE_DEEP = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150404981837844/the-deep-the-boys.gif';
    private const YA_PROSHAU_TEBYA = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150608736911441/tobey-maguire-peter-parker.gif';
    private const DAYNI_OBSHII_SBOR = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093156246401597510/sbor.gif';
    private const KOMANDA_V_SBORE = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093157258730410075/the-boys.gif';
    private const FREE_1 = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093157125347356722/besplatno2.gif';
    private const USHEL_SRAT = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093250917865897996/8ffc0c2b41e8f8cc.gif';
    private const EGOR_AND_CHINGIZ = 'https://cdn.discordapp.com/attachments/1092737067252990002/1093250802082123928/EGOR_CHINGIZ.gif';


    public static function url(string $name, array $options): string
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