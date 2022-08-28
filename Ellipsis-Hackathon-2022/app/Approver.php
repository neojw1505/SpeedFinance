<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approver extends Model
{

    use Hashidable;
    use SoftDeletes;



    protected static function boot()
    {
        parent::boot();

        static::deleting(function($resource) {
            $apps = Application_Approver::where('approver_id', '=', $resource->id)->get();
            foreach($apps as $app){
                $app->delete();
            }
        });

        static::restoring(function($resource) {
            $apps = Application_Approver::withTrashed()->where('approver_id', '=', $resource->id)->get();
            foreach($apps as $app){
                $app->restore();
            }
 
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class)->withPivot('id', 'approver_id', 'status')->withTimestamps();
    }

    public function assignApplications($applications)
    {
        if(is_numeric($applications)) {
            $applications = Application::whereId($applications)->firstOrFail();
        }
        $this->applications()->sync($applications, false);
    }
}
