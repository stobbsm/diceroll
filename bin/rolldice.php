#!/usr/bin/php -q
<?php

/**
 * This file is part of Diceroll.
 *
 *     Diceroll is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     Foobar is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * Created by PhpStorm.
 * User: stobbsm
 * Date: 22/07/16
 * Time: 10:44 PM
 */

require_once(__DIR__ . "/../vendor/autoload.php");

array_shift($argv);
if(count($argv) == 0) {
    echo "Usage: " . basename(__FILE__) . "<options> <D&D Dice string>\n";
    echo "Options:\n";
    echo "\t-p - Easy to parse output in the same order it was entered\n";
    echo "Example of D&D Dice Form: 2d6+3\n";
    exit(1);
}

$parseAble=false;

$roller = new \Diceroll\Diceroller();
$roll=[];
foreach($argv as $diceString) {
    if($diceString == "-p") {
        $parseAble=true;
    }
    else {
        $roll[$diceString] = $roller->rollNamedDice($diceString);
    }
}

if($parseAble) {
    $printPattern="%s=%s|";
}
else {
    $printPattern="%s rolled: %s\n";
}

foreach($roll as $diceString=>$value) {
    if(is_array($value)) {
        printf($printPattern, $diceString, "error");
    }
    else {
        printf($printPattern, $diceString, $value);
    }
}