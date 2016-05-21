<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = array(
        'id',
        'name',
        'contact_number',
        'field'
    );
    
    /**
     * Get the comments for the blog post.
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
