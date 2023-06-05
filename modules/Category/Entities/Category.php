<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Category\Enums\CategoryStatus;
use Modules\Category\Fields\CategoryFields;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        CategoryFields::PARENT_ID,
        CategoryFields::NAME,
        CategoryFields::SLUG,
        CategoryFields::SUMMARY,
        CategoryFields::COVER_IMAGE_URL,
        CategoryFields::ICON,
        CategoryFields::STATUS,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        CategoryFields::STATUS => CategoryStatus::class,
    ];
    /**
     * Define a new factory for this model.
     *
     * @return CategoryFactory
     */
    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }


    /**
     * Get the parent category that owns this category.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this,CategoryFields::PARENT_ID);
    }

    /**
     * Get the children categories for this category.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany($this,CategoryFields::PARENT_ID)->with('children');
    }


}
