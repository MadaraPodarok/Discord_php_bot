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
                }
                break;
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