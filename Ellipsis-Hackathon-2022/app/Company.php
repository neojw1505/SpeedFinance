<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use Hashidable;
    
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'uen', 'address', 'industry_id', 'gst_registered'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function allContacts()
    {
        return $this->contacts;
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    
    public function industries()
    {
        return $this->belongsTo(Industry::class,'industry_id', 'id');
    }
}
