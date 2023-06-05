<?php

namespace Modules\Category\Enums;

use Modules\Support\Traits\WithEnumHelper;

enum CategoryStatus: int
{
    use WithEnumHelper;

    case DISABLE = 0;
    case ENABLE  = 1;
}
