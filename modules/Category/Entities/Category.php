<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Fields\CategoryFields;

class Category extends Model
{
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

    public function parent()
    {
        return $this->belongsTo($this,CategoryFields::PARENT_ID);
    }

    public function children()
    {
        return $this->hasMany($this,CategoryFields::PARENT_ID)->with('children');
    }


}
