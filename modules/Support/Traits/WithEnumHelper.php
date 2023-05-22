<?php

namespace Modules\Support\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait WithEnumHelper
{
    /**
     * Get the enum short name
     *
     * @param bool $lower
     *
     * @return string
     */
    private static function shortName(bool $lower = true): string
    {
        $_name = basename(str_replace('\\', '/', get_called_class()));
        return $lower ? Str::snake($_name) : $_name;
    }

    /**
     * Get the module name
     *
     * @param bool $lower
     *
     * @return string
     */
    private static function moduleName(bool $lower = true): string
    {
        $_name = explode('\\', __CLASS__)[1];
        return $lower ? strtolower($_name) : $_name;
    }

    /**
     * Get pairs
     *
     * @return Collection
     */
    public static function pairs(): Collection
    {
        return collect(self::cases())->mapWithKeys(
            fn($case) => [$case->value => $case->trans()]);
    }

    /**
     * Translate case
     *
     * @return string
     */
    public function trans(): string
    {
        return __(self::moduleName() . '::enum.' . self::shortName() . '.' . Str::snake($this->name));
    }
}
