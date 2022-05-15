<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteUser extends Model
{
    protected $fillable = ['user_id', 'website_id'];
}
