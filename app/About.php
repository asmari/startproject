<?php

namespace App\Models;

use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class About extends Model implements HasMedia
{
    use SoftDeletes;
    use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'title',
        'slug',
        'content_id',
        'content_en',
        'created_by_admin_user_id',
        'updated_by_admin_user_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/abouts/'.$this->getKey());
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->accepts('image/*');
//
//        $this->addMediaCollection('gallery')
//            ->accepts('image/*')
//            ->maxNumberOfFiles(20);
//
//        $this->addMediaCollection('pdf')
//            ->accepts('application/pdf');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
    }
}
