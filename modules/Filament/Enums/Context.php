<?php

namespace Modules\Filament\Enums;

enum Context: string
{
    case View   = 'view';
    case Edit   = 'edit';
    case Create = 'create';
}
