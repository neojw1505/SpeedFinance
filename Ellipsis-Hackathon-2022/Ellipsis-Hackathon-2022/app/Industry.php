<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{

    use Hashidable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}
