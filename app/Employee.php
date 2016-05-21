<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = array(
        'id',
        'company_id',
        'name',
        'email',
        'contact_number',
        'position'
    );

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
