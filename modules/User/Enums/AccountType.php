<?php

namespace Modules\User\Enums;

use Modules\Support\Traits\WithEnumHelper;

enum AccountType: int
{
    use WithEnumHelper;

    case User    = 0;
    case Blogger = 1;
    case Admin   = 2;
    case System  = 3;
}
