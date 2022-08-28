<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use Hashidable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id', 'company_id', 'user_id', 'created_by', 'status', 'reminder', 'reminder_date', 'score', 'status',
        'loan_amt', 'loan_tenure', 'interest', 'remark', 'origination_fee', 'consultant_company',
        'consultant_name', 'consultant_contact', 'approved_at', 'loan_type', 'interest_type', 'memo'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'reminder_date' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'approved_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class)->withPivot('id')->withTimestamps();
    }

    public function assignChecklist($checklists)
    {
        if (is_numeric($checklists)) {
            $checklists = Checklist::whereId($checklists)->firstOrFail();
        }
        $this->checklists()->sync($checklists, false);
    }

    public function approvers()
    {
        return $this->belongsToMany(Approver::class)->withPivot('id', 'approver_id', 'approved_by', 'rejected_by')->withTimestamps();
    }

    public function assignApprover($approvers)
    {
        if (is_numeric($approvers)) {
            $approvers = Approver::whereId($approvers)->firstOrFail();
        }
        $this->approvers()->sync($approvers, false);
    }
}
