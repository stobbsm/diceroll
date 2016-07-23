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
 * Time: 8:35 PM
 */

namespace Diceroll;

abstract class Dice implements iDice
{
    public final function __construct() {
        if(!isset($this->range)) {
            throw new \LogicException(get_class($this) . ' must have a $range');
        }
    }

    /**
     * @param int $numDice Number of D6's to roll
     * @return int
     */
    public function roll(int $numDice=1) {
        $total=0;

        for($i=0;$i<$numDice;$i++) {
            $total+=random_int(1, $this->range);
        }

        return $total;
    }
}