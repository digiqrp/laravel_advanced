<?php

namespace App;

use App\Scopes\PointScope;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected static function boot(){
        parent::boot();
        Static::addGlobalScope(new PointScope());
    }
}
