<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = array(
        'id',
        'employee_id',
        'personal_tags',
        'professional_tags',
        'rate_person',
        'rate_profession',
        'worker_description',
        'personal_description',
        'professional_feedback',
        'personal_feedback',
        'sociable',
        'creepy',
        'awesome'
    );

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
