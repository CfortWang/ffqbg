<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserSetting;
use App\Models\Setting;
class UserMessage extends Model
{
    use SoftDeletes;

    protected $table = 'user_message';

    protected $guarded = [
        'id',
    ];

    public $primaryKey ='id';

    protected $fillable = [];
}
