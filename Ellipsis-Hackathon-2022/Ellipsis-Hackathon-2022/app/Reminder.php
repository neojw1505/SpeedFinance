<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{

    use Hashidable;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'detail', 'application_id', 'created_by', 'updated_by', 'dateTime','remindBef','remindAt'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dateTime','remindAt'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
