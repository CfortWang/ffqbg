<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role2Menu extends Model
{
    use SoftDeletes;

    protected $table = 'role2menu';

    protected $guarded = [
        'id',
    ];

    public $primaryKey ='id';

    protected $fillable = [];
}
