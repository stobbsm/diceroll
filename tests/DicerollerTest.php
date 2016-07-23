<?php
/**
 * This file is part of Diceroll.
 *
 *     Diceroll is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     Diceroll is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with Diceroll.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Created by PhpStorm.
 * User: stobbsm
 * Date: 22/07/16
 * Time: 9:46 PM
 */

use Diceroll\Diceroller;

class DicerollTest extends PHPUnit_Framework_TestCase
{
    protected $roller;
    public function setUp() {
        $this->roller=new Diceroller();
    }

    public function testParseFailsWithNonMatch() {
        $input="1d4-2";
        $this->assertFalse($this->roller->parseDice($input));
    }

    public function testParseDiceStringWithoutModifier() {
        $expected=[1,4];
        $input="1d4";

        $this->assertEquals($expected, $this->roller->parseDice($input));
    }

    /**
     * @depends testParseDiceStringWithoutModifier
     */
    public function testParseDiceStringWithoutLeadingNumber() {
        $expected=[1,4];
        $input="d4";

        $this->assertEquals($expected, $this->roller->parseDice($input));
    }

    /**
     * @depends testParseDiceStringWithoutLeadingNumber
     */
    public function testRollNamedDiceWitoutModifier() {
        $min=1;
        $max=4;
        $input="d4";
        $value=$this->roller->rollNamedDice($input);

        $this->assertGreaterThanOrEqual($min,$value);
        $this->assertLessThanOrEqual($max, $value);
    }

    public function testParseDiceStringWithModifier() {
        $expected=[2,4,2];
        $input="2d4+2";

        $this->assertEquals($expected, $this->roller->parseDice($input));
    }

    /**
     * @depends testParseDiceStringWithModifier
     */
    public function testRollNamedDiceWithModifier() {
        $min=3;
        $max=6;
        $input="d4+2";

        $value=$this->roller->rollNamedDice($input);

        $this->assertGreaterThanOrEqual($min,$value);
        $this->assertLessThanOrEqual($max, $value);
    }
}
