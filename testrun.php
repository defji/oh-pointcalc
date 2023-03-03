<?php

use PointCalc\Calculator;
use PointCalc\Exceptions\LowLevelGraduateException;
use PointCalc\Exceptions\RequiredSubNotFoundException;

include "vendor/autoload.php";
include "data/exampledata.php";


try {
    var_dump((new Calculator($exampleData))->points());
} catch (LowLevelGraduateException|RequiredSubNotFoundException $e) {
    var_dump($e->getMessage());
}
try {
    var_dump((new Calculator($exampleData1))->points());
} catch (LowLevelGraduateException|RequiredSubNotFoundException $e) {
    var_dump($e->getMessage());
}
try {
    var_dump((new Calculator($exampleData2))->points());
} catch (LowLevelGraduateException|RequiredSubNotFoundException $e) {
    var_dump($e->getMessage());
}
try {
    var_dump((new Calculator($exampleData3))->points());
} catch (LowLevelGraduateException|RequiredSubNotFoundException $e) {
    var_dump($e->getMessage());
}

