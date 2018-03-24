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
 * Time: 8:07 PM
 */

use Diceroll\Dice\d6;


class d6Test extends PHPUnit\Framework\TestCase
{
    protected $min=1;
    protected $max=6;
    public function testOneIsBetweenOneAndSix() {
        $d6 = new d6();
        $value=$d6->roll();

        $this->assertGreaterThanOrEqual($this->min, $value);
        $this->assertLessThanOrEqual($this->max, $value);
    }
}
