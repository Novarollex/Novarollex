<?php
use App\components;

namespace App;

use Illuminate\Database\Eloquent\Model;

class prods extends Model
{
    public function  components(){
        return $this->hasMany(components::class);
    }
}
