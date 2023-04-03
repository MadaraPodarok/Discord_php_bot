<?php

namespace Config;

class RandomGif
{
    public static function url(string $name): string
    {
        $randomUrl = random_int(1, 2);
        $urlDamir = match ($randomUrl) {
            1 => 'https://giphy.com/gifs/tlou-stariylululul-NCMbaQhkPVXfhlcnbI',
            2 => 'https://giphy.com/gifs/mads-laOHbXBwEc1aa3SFP4',
        };

        $urlTester = match ($randomUrl) {
            1 => 'bruh',
            2 => 'tester1',
        };
        return match ($name) {
            'Damir' => $urlDamir,
            'Tester' => $urlTester
        };
    }
}