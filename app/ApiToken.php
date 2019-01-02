<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    // Table Name
    protected $table = 'api_tokens';
    
    public $primaryKey = 'id';
}