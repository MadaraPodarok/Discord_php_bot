<?php

namespace Config;

class RandomGif
{
    public static function url(string $name, int $action): string
    {
        switch ($name) {
            case 'Damir':
                switch ($action) {
                    case 0:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093156213434359888/farcry3.gif';
                    case 1:
                        $listUrl = [
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093155320370577459/a3d747a038e5af0e.gif',
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093155463803174942/wow-homelander.gif',
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093156109751160932/homelander-the-boys_1.gif',
                        ];
                        return $listUrl[array_rand($listUrl)];
                    case 2:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093155187738284102/tlou.gif';
                }
                break;
            case 'Chingiz':
            case 'Alex':
                switch ($action) {
                    case 0:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159442826145842/the-boys-the-deep.gif';
                    case 1:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149053128294470/fifa-fifa-time.gif';
                    case 2:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159154853609623/socialka-papich.gif';
                }
                break;
            case 'Egor':
                switch ($action) {
                    case 0:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149361493528587/blowjob-the-deep.gif';
                    case 1:
                        $listUrl = [
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093155320370577459/a3d747a038e5af0e.gif',
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093155463803174942/wow-homelander.gif',
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093156109751160932/homelander-the-boys_1.gif',
                        ];
                        return $listUrl[array_rand($listUrl)];
                    case 2:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149473124913192/dota-players.gif';
                }
                break;
            case 'Anastasiya':
                switch ($action) {
                    case 0:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093158856265310318/the-deep-the-boys.gif';
                    case 1:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150844330967060/-.gif';
                    case 2:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093149848150224976/dota2-egor.gif';
                }
                break;
            case 'Timur':
                switch ($action) {
                    case 1:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150058561679380/the-boys-jensen-ackles.gif';
                    case 2:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093159726759563345/oof-homelander.gif';
                }
                break;
            case 'Askar':
                switch ($action) {
                    case 0:
                        return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093150252086866000/aronanto-homelander.gif';
                    case 1:
                        $listUrl = [
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093150404981837844/the-deep-the-boys.gif',
                            'https://cdn.discordapp.com/attachments/1092737067252990002/1093150608736911441/tobey-maguire-peter-parker.gif',
                        ];
                        return $listUrl[array_rand($listUrl)];
                    case 2:
                        return '';
                }
                break;
            case 'CS Team':
            case 'Dota Team':
            switch ($action) {
                case 0:
                    return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093156246401597510/sbor.gif';
                case 1:
                    $listUrl = [
                        'https://cdn.discordapp.com/attachments/1092737067252990002/1093157258730410075/the-boys.gif',
                    ];
                    return $listUrl[array_rand($listUrl)];
                case 2:
                    return 'https://cdn.discordapp.com/attachments/1092737067252990002/1093157125347356722/besplatno2.gif';
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