<?php

namespace Config;

class RandomGif
{
    public static function url(string $name): string
    {
        switch ($name) {
            case 'Damir':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://giphy.com/gifs/tlou-stariylululul-NCMbaQhkPVXfhlcnbI';
                    case 2:
                        return 'https://giphy.com/gifs/mads-laOHbXBwEc1aa3SFP4';
                    case 3:
                        return 'https://tenor.com/ru/view/wow-homelander-the-boys-super-gif-19837363';
                    case 4:
                        return 'https://tenor.com/ru/view/homelander-the-boys-happy-sad-smile-gif-18767435';
                    case 5:
                        return 'https://tenor.com/ru/view/farcry3-gif-20987386';
                }
                break;
            case 'Chingiz':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://tenor.com/ru/view/fifa-fifa-time-perla-jipi-gif-23689416';
                    case 2:
                        return 'test';
                }
                break;
            case 'Egor':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://tenor.com/ru/view/blowjob-the-deep-the-boys-suck-it-bj-gif-25704616';
                    case 2:
                        return 'https://tenor.com/ru/view/dota-players-be-like-gif-9920681';
                }
                break;
            case 'Anastasiya':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://tenor.com/ru/view/%D0%B3%D0%B5%D0%BD%D1%88%D0%B8%D0%BD-%D1%83%D0%B4%D0%B0%D0%BB%D1%8F%D1%8E-%D0%BF%D0%B0%D0%BF%D0%B8%D1%87-%D1%80%D0%BE%D0%BC%D1%87%D0%B8%D0%BA-uninstall-gif-22735226';
                    case 2:
                        return 'test';
                }
                break;
            case 'Timur':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://tenor.com/ru/view/the-boys-jensen-ackles-soldier-boy-gay-couple-the-boys-season3-gif-26030215';
                    case 2:
                        return 'test';
                }
                break;
            case 'Askar':
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'https://tenor.com/ru/view/aronanto-homelander-gif-23374827';
                    case 2:
                        return 'test';
                }
                break;
            case 'CS Team':
            case 'Dota Team':
                return 'https://tenor.com/view/the-boys-gif-18544958';
            case 'Tester':
            default:
                $randomUrl = random_int(1, 2);
                switch ($randomUrl) {
                    case 1:
                        return 'bruh';
                    case 2:
                        return 'tester1';
                }
                break;
        }
        return 'tester1';
    }
}