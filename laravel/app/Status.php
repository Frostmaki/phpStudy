<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    //
    protected $table="statuses";

    public function user()
    {
      # code...
      return $this->belongsto(User::class);
    }

}
