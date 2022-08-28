<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Audit extends Model
{
    //
    use LogsActivity;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
