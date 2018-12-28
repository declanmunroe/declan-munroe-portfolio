<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteVisit extends Model
{
    // Table Name
    protected $table = 'site_visits';
    
    public $primaryKey = 'id';
}
