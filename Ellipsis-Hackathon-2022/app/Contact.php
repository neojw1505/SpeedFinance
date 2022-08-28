<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Hashidable;
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'company_id', 'name', 'mobile', 'type', 'title', 'email'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
