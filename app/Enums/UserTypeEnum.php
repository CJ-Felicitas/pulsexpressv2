<?php

namespace App\Enums;

use Nasyrov\Laravel\Enums\Enum;

class UserTypeEnum extends Enum
{
    const ADMIN = 1;
    const GUEST = 2;
    const TESTER = 3;
    const PROGRAM = 4;

    // programs
    const FOURPS = 5;
    const KALAHI = 6;
    const SLP = 7;
    const DRRM = 8;
    const FEEDING_PROGRAM = 9;
    const SOCIAL_PENSION_PROGRAM = 10;
    const CENTENARRIAN = 11;
    const AICS = 12;
}
