<?php

namespace Modules\User\Enums;

use Modules\Support\Traits\WithEnumHelper;

enum AccountStatus: int
{
    use WithEnumHelper;

    case Free    = 0;
    case Limited = 1;
    case Banned  = 2;
    case Removed = 3;
}
