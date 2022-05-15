<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{ 
    protected $fillable = ['name'];

    public function users(){
        return $this->belongsToMany(User::class, "website_users", "website_id", "user_id");
    }
}
