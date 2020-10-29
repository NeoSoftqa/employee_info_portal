<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';



     public function user()
    {
        return $this->hasMany('User');
    }


}
