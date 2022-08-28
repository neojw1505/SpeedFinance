<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    use Hashidable;
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail', 'application_id', 'created_by', 'updated_by'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
