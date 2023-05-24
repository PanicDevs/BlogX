<?php

namespace Modules\Filament\Traits;

use Illuminate\Support\Str;

trait WithResourceHelper
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
        $_name = Str::of($_name)->replace('Resource', '')->toString();
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
     * Get the navigation icon
     *
     * @return string
     */
    protected static function getNavigationIcon(): string
    {
        return config(self::moduleName() . '.filament.' . self::shortName() . '.icon');
    }

    /**
     * Get the singular label
     *
     * @return ?string
     */
    public static function getLabel(): ?string
    {
        return __(self::moduleName() . '::resource.' . self::shortName() . '.trans.singular');
    }

    /**
     * Get the plural label
     *
     * @return ?string
     */
    public static function getPluralLabel(): ?string
    {
        return __(self::moduleName() . '::resource.' . self::shortName() . '.trans.plural');
    }

    /**
     * Get the navigation sort
     *
     * @return ?int
     */
    protected static function getNavigationSort(): ?int
    {
        return (int)config(self::moduleName() . '.filament.' . self::shortName() . '.nav.sort');
    }

    /**
     * Get the navigation group
     *
     * @return ?string
     */
    protected static function getNavigationGroup(): ?string
    {
        $_group = config(self::moduleName() . '.filament.' . self::shortName() . '.nav.group');
        return __(self::moduleName() . '::nav.' . $_group . '.label');
    }

    /**
     * Customize resource slug for module structure.
     *
     * @return string
     */
    public static function getSlug(): string
    {
        if (filled(static::$slug))
            return static::$slug;

        return Str::of(self::shortName())->plural();
    }
}
