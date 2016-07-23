# diceroll
A PHP class to roll dice for use in dice based RPGs, or even just to roll dice.

This simple library includes an easy to extend abstract class called "Dice" that parses 
D&D dice strings (d6+5, 1d4, 2d12, etc.) into roles for use in RPG's.

Eventually, this will be used in conjunction with other pieces of software I'm making
in order to run a campaign over the internet with easy to see results.

---

Changelog
---
- 0.0.1 - Initial release

    Initial Features:
    - 7 available basic dice sizes (d4, d6, d8, d10, d12, d20, d100)
    - Basic Dice String parsing. Example: 2d4+2 will roll 2 dice with values between 1 
    and 4, and then add 2 to the result, for a minimum value of 4 and a maximum value
    of 10.
    - Very basic commandline tool called rolldice that accepts multiple dice strings
    at one time, with the option of outputting in a more parsable and predictable format. 
    (I'll be using it for shell scripting some stupid games).
    
    TODO:
    - Do away with strange use of classes inheriting from the base "Dice" class to control 
    ranges. It's ugly, but I wanted to get something workable and predictable done first.
    To see what I mean, browse the source and check out the classes under the "Dice"
    directory. Very hacky.
    - Run some benchmarks and optimize what I have done so rolling dice doesn't bog down 
    the server this is running on.

CopyRight
---

diceroll - a PHP based RPG dice roller

Copyright (C) 2016  Matthew Stobbs <matthew@sproutingcommunications.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*Licensed under the GNU General Public License v3.0 ([GPLv3](LICENSE))*

