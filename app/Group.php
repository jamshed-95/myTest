<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public $timestamps=false;

    public function contacts()
    {
        return $this->belongsToMany('App\Contact', 'user_contact_groups')->withTimestamps()->withPivot('group_id');
    }
}
