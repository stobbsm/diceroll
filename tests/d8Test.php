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
 * Time: 8:47 PM
 */

use Diceroll\Dice\d8;

class d8Test extends PHPUnit_Framework_TestCase
{
    protected $min=1;
    protected $max=8;
    public function testOneIsBetweenOneAndEight() {
        $d8 = new d8();
        $value=$d8->roll();

        $this->assertGreaterThanOrEqual($this->min, $value);
        $this->assertLessThanOrEqual($this->max, $value);
    }
}
