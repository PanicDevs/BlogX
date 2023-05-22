<?php

namespace Modules\Filament\Contracts;

use Throwable;

interface ExportableSchema
{
    /**
     * Get the form schema
     *
     * @return array
     */
    public static function formSchema(): array;

    /**
     * Get the table schema
     *
     * @return array
     */
    public static function tableSchema(): array;

    /**
     * Get the table filters
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableFilters(): array;

    /**
     * Get the table actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableActions(): array;

    /**
     * Get the table bulk actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableBulkActions(): array;
}
