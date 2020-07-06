<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GameStatus extends Enum
{
    const Deactive =   -1;
    const Lock =  0;
    const Active = 1;
}
