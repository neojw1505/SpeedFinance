<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{

    use Hashidable;
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name',
         'category',
         'isMandatory'
    ];

    public function applications(){
        return $this->belongsToMany(Application::class)->withTimestamps();
    }
}
