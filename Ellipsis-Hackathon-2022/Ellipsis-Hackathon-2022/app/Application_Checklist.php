<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Application_Checklist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'application_checklist';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function files()
    {
        return $this->hasMany(File::class, 'application_checklist_id');
    }

    public function checklists(){
        return $this->belongsTo(Checklist::class, 'checklist_id', 'id');
    }

    public function Application(){
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    
}
