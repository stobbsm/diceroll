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
 * Time: 9:31 PM
 */

namespace Diceroll;

class Diceroller
{
    /**
     * @param string $dice A D&D type roll name, ie. 1d6, 4d4, 2d8, etc.
     *
     * @return integer Value of rolled dice name
     */
    public function rollNamedDice(string $dice) {
        try {
            $parsedDice = $this->parseDice($dice);

            if($parsedDice==false) {
                throw new \Exception("Invalid dice string: $dice", E_USER_WARNING);
            }
            $className="\\Diceroll\\Dice\\d".$parsedDice[1];
            $roller=new $className;

            $roll=$roller->roll($parsedDice[0]);
            if(isset($parsedDice[2])) {
                $roll += $parsedDice[2];
            }
        }
        catch (\Exception $e) {
            $roll=[
                false,
                $e->getCode(),
                $e->getMessage()];
        }
        finally {
            return $roll;
        }
    }

    /**
     * @param string $dice The Brackus-Naur dice string
     * @return mixed Array containing the seperate numbers if valid, false if not
     */
    public function parseDice(string $dice) {
        $pattern='/[d+]/';

        $values = preg_split($pattern, $dice);

        if(!is_numeric($values[1])) {
            $values=false;
        } else {
            $values[0]=($values[0] != null ? $values[0] : 1);
        }

        return $values;
    }
}