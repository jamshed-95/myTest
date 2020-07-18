<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContactGroup extends Model
{
    public function group(){
        return $this->belongsTo('App\Group','group_id','id');
    }


}
