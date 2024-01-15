<?php

namespace Config;

use Log\Log;

class RandomGif
{
    private const string DAMIR_ZASHEL_V_TLOU = __DIR__ . '/../Gif/DAMIR_ZASHEL_V_TLOU.gif';
    private const string YA_VERNULSYA_V_STROI = __DIR__ . '/../Gif/YA_VERNULSYA_V_STROI.gif';
    private const string WOW_HOMELANDER = __DIR__ . '/../Gif/WOW_HOMELANDER.gif';
    private const string NE_PON_HOMELANDER = __DIR__ . '/../Gif/NE_PON_HOMELANDER.gif';
    public const string DUMAET_THE_DEEP = __DIR__ . '/../Gif/DUMAET_THE_DEEP.gif';
    private const string FIFA_TIME = __DIR__ . '/../Gif/FIFA_TIME.gif';
    private const string PLUS_SOCIAL_CREDIT = __DIR__ . '/../Gif/PLUS_SOCIAL_CREDIT.gif';
    private const string SOSAT_THE_DEEP = __DIR__ . '/../Gif/SOSAT_THE_DEEP.gif';
    private const string IGRAU_V_DOTY_NE_MESHAI = __DIR__ . '/../Gif/IGRAU_V_DOTY_NE_MESHAI.gif';
    private const string UDALYAU_GENSHIN = __DIR__ . '/../Gif/UDALYAU_GENSHIN.gif';
    private const string EGOR_GO_DOTKY = __DIR__ . '/../Gif/EGOR_GO_DOTKY.gif';
    private const string SMOTRU_NA_PIDOROV = __DIR__ . '/../Gif/SMOTRU_NA_PIDOROV.gif';
    private const string OOF_HOMELANDER = __DIR__ . '/../Gif/OOF_HOMELANDER.gif';
    private const string POLEGCHE_HOMELANDER = __DIR__ . '/../Gif/POLEGCHE_HOMELANDER.gif';

    private const string YA_VERNULSYA_THE_DEEP = __DIR__ . '/../Gif/YA_VERNULSYA_THE_DEEP.gif';
    private const string YA_PROSHAU_TEBYA = __DIR__ . '/../Gif/YA_PROSHAU_TEBYA.gif';
    private const string DAYNI_OBSHII_SBOR = __DIR__ . '/../Gif/DAYNI_OBSHII_SBOR.gif';
    private const string KOMANDA_V_SBORE = __DIR__ . '/../Gif/KOMANDA_V_SBORE.gif';
    private const string FREE_1 = __DIR__ . '/../Gif/FREE_1.gif';
    private const string USHEL_SRAT = __DIR__ . '/../Gif/USHEL_SRAT.gif';
    private const string EGOR_AND_CHINGIZ = __DIR__ . '/../Gif/EGOR_AND_CHINGIZ.gif';
    private const string IDEM_V_CS = __DIR__ . '/../Gif/IDEM_V_CS.gif';


    public static function gif(string $name, array $options): string
    {
        switch ($name) {
            case 'Damir':
                return self::nameDamir($options);
            case 'Chingiz':
                return self::nameChingiz($options);
            case 'Alex':
                return self::nameAlex($options);
            case 'Egor':
                return self::nameEgor($options);
            case 'Anastasiya':
                return self::nameAnastasiya($options);
            case 'Timur':
                return self::nameTimur($options);
            case 'Askar':
                return self::nameAskar($options);
            case 'Sergei':
                return self::nameSergei($options);
            case 'Ivan':
                return self::nameIvan($options);
            case 'Maxim':
                return self::nameMaxim($options);
            case 'Sergei_Piter':
                return self::nameSergeiPiter($options);
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
        Log::sendLog('error', 'Кого то забыли? ' . $name);
        return '';
    }

    private static function nameDamir(array $options): string
    {
        $action = $options['action'] ?? null;

        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
                self::USHEL_SRAT,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $urlOrVideo = random_int(0, 1);
            if ($urlOrVideo === 0) {
                $listUrl = [
                    self::YA_VERNULSYA_V_STROI,
                    self::WOW_HOMELANDER,
                    self::NE_PON_HOMELANDER,
                ];
                return $listUrl[array_rand($listUrl)];
            }

            return RandomVideo::video('Damir', $options);
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'The Last of Us')) {
            return self::DAMIR_ZASHEL_V_TLOU;
        }
        if (str_contains($game, 'War Thunder')) {
            return self::SMOTRU_NA_PIDOROV;
        }
        if (str_contains($game, 'Dota 2')) {
            return self::SMOTRU_NA_PIDOROV;
        }

        $gameParty = $options['gameParty'] ?? null;
        if (str_contains($gameParty, 'War Thunder')) {
            return self::SMOTRU_NA_PIDOROV;
        }
        if (str_contains($gameParty, 'Dota 2')) {
            return self::SMOTRU_NA_PIDOROV;
        }
        if (str_contains($gameParty, 'The Sims')) {
            return self::KOMANDA_V_SBORE;
        }

        Log::sendLog('error', 'Дамир куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);

        return '';
    }

    private static function nameChingiz(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $urlOrVideo = random_int(0, 1);
            if ($urlOrVideo === 0) {
                $listUrl = [
                    self::FIFA_TIME,
                    self::IDEM_V_CS,
                ];
                return $listUrl[array_rand($listUrl)];
            }
            return RandomVideo::video('Chingiz', $options);
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'FIFA')) {
            return self::FIFA_TIME;
        }

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        $gameParty = $options['gameParty'] ?? null;

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        Log::sendLog('error', 'Чингиз куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameAlex(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $urlOrVideo = random_int(0, 1);
            if ($urlOrVideo === 0) {
                $listUrl = [
                    self::FIFA_TIME,
                    self::IDEM_V_CS,
                ];
                return $listUrl[array_rand($listUrl)];
            }
            return RandomVideo::video('Alex', $options);
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'FIFA')) {
            return self::FIFA_TIME;
        }

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        $gameParty = $options['gameParty'] ?? null;

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        Log::sendLog('error', 'Александр куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameEgor(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 0) {
            $listUrl = [
                self::SOSAT_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::YA_VERNULSYA_V_STROI,
                self::WOW_HOMELANDER,
                self::NE_PON_HOMELANDER,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Dota 2')) {
            return self::IGRAU_V_DOTY_NE_MESHAI;
        }

        $gameParty = $options['gameParty'] ?? null;
        if (str_contains($gameParty, 'War Thunder')) {
            return self::SMOTRU_NA_PIDOROV;
        }
        if (str_contains($gameParty, 'Dota 2')) {
            return self::SMOTRU_NA_PIDOROV;
        }

        Log::sendLog('error', 'Егор куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameAnastasiya(array $options): string
    {
        $action = $options['action'] ?? null;
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

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Dota 2')) {
            return self::EGOR_GO_DOTKY;
        }

        $gameParty = $options['gameParty'] ?? null;
        if (str_contains($gameParty, 'Dota 2')) {
            return self::SMOTRU_NA_PIDOROV;
        }

        Log::sendLog('error', 'Анастасия куда то зашла?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameTimur(array $options): string
    {
        $action = $options['action'] ?? null;
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

        $game = $options['game'] ?? null;

        if (str_contains($game, 'The Sims')) {
            return self::OOF_HOMELANDER;
        }

        $gameParty = $options['gameParty'] ?? null;
        if (str_contains($gameParty, 'The Sims')) {
            return self::KOMANDA_V_SBORE;
        }
        Log::sendLog('error', 'Тимур куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameAskar(array $options): string
    {
        $action = $options['action'] ?? null;
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

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Dota 2')) {
            return self::IGRAU_V_DOTY_NE_MESHAI;
        }
        $gameParty = $options['gameParty'] ?? null;

        Log::sendLog('error', 'Аскар куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameSergei(array $options): string
    {
        $action = $options['action'] ?? null;
        $game = $options['game'] ?? null;
        $gameParty = $options['gameParty'] ?? null;
        if (str_contains($gameParty, 'The Sims')) {
            return self::KOMANDA_V_SBORE;
        }
        Log::sendLog('error', 'Сергей куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameIvan(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::FIFA_TIME,
                self::IDEM_V_CS,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'FIFA')) {
            return self::FIFA_TIME;
        }

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        $gameParty = $options['gameParty'] ?? null;

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        Log::sendLog('error', 'Иван куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameMaxim(array $options): string
    {
        $action = $options['action'] ?? null;
        if ($action === 0) {
            $listUrl = [
                self::DUMAET_THE_DEEP,
            ];
            return $listUrl[array_rand($listUrl)];
        }
        if ($action === 1) {
            $listUrl = [
                self::IDEM_V_CS,
            ];
            return $listUrl[array_rand($listUrl)];
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        $gameParty = $options['gameParty'] ?? null;

        if (str_contains($game, 'Counter-Strike')) {
            return self::IDEM_V_CS;
        }

        Log::sendLog('error', 'Максим куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);
        return '';
    }

    private static function nameSergeiPiter(array $options): string
    {
        $action = $options['action'] ?? null;

        if ($action === 1) {
            return RandomVideo::video('Sergei_Piter', $options);
        }

        $game = $options['game'] ?? null;

        if (str_contains($game, 'Furry')) {
            return RandomVideo::video('Sergei_Piter', $options);
        }

        $gameParty = $options['gameParty'] ?? null;

        Log::sendLog('error', 'Дамир куда то зашел?', [
            'action' => $action,
            'game' => $game,
            'gameParty' => $gameParty
        ]);

        return '';
    }
}