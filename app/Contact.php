<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;
    protected $fillable = [
        'title',
        'slug',
        'phone_number',
        'address_type',
        'address',
        'map_url',
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
        return url('/admin/contacts/'.$this->getKey());
    }
}
