<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = array(
        'id',
        'employee_id',
        'name',
        'email',
        'contact_number',
        'position',
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
