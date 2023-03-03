<?php

use PointCalc\Calculator;

include "vendor/autoload.php";

global $exampleData;

//$exampleData = [
//    'valasztott-szak'      => [
//        'egyetem' => 'ELTE',
//        'kar'     => 'IK',
//        'szak'    => 'Programtervező informatikus',
//    ],
//    'erettsegi-eredmenyek' => [
//        [
//            'nev'      => 'magyar nyelv és irodalom',
//            'tipus'    => 'közép',
//            'eredmeny' => '70%',
//        ],
//        [
//            'nev'      => 'történelem',
//            'tipus'    => 'közép',
//            'eredmeny' => '80%',
//        ],
//        [
//            'nev'      => 'matematika',
//            'tipus'    => 'emelt',
//            'eredmeny' => '90%',
//        ],
//        [
//            'nev'      => 'angol nyelv',
//            'tipus'    => 'közép',
//            'eredmeny' => '94%',
//        ],
//        [
//            'nev'      => 'informatika',
//            'tipus'    => 'közép',
//            'eredmeny' => '95%',
//        ],
//    ],
//    'tobbletpontok'        => [
//        [
//            'kategoria' => 'Nyelvvizsga',
//            'tipus'     => 'B2',
//            'nyelv'     => 'angol',
//        ],
//        [
//            'kategoria' => 'Nyelvvizsga',
//            'tipus'     => 'C1',
//            'nyelv'     => 'német',
//        ],
//    ],
//];

/*
$exampleData = [
'valasztott-szak'      => [
    'egyetem' => 'ELTE',
    'kar'     => 'IK',
    'szak'    => 'Programtervező informatikus',
],
    'erettsegi-eredmenyek' => [
    [
        'nev'      => 'magyar nyelv és irodalom',
        'tipus'    => 'közép',
        'eredmeny' => '70%',
    ],
    [
        'nev'      => 'történelem',
        'tipus'    => 'közép',
        'eredmeny' => '80%',
    ],
    [
        'nev'      => 'matematika',
        'tipus'    => 'emelt',
        'eredmeny' => '90%',
    ],
    [
        'nev'      => 'angol nyelv',
        'tipus'    => 'közép',
        'eredmeny' => '94%',
    ],
    [
        'nev'      => 'informatika',
        'tipus'    => 'közép',
        'eredmeny' => '95%',
    ],
    [
        'nev'      => 'fizika',
        'tipus'    => 'közép',
        'eredmeny' => '98%',
    ],
],
    'tobbletpontok'        => [
    [
        'kategoria' => 'Nyelvvizsga',
        'tipus'     => 'B2',
        'nyelv'     => 'angol',
    ],
    [
        'kategoria' => 'Nyelvvizsga',
        'tipus'     => 'C1',
        'nyelv'     => 'német',
    ],
],
];
*/

var_dump($exampleData);
die;

$calc = new Calculator($exampleData);
print $calc->additionalPoints();