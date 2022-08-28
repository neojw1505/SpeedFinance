<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    use Hashidable;
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path','name', 'application_checklist_id', 
   ];

   public function application_checklist(){
       return $this->belongsTo(Application_Checklist::class, 'application_checklist_id');
   }
}
