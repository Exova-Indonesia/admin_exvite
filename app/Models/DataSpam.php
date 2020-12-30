<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSpam extends Model
{
    use HasFactory;

    protected $table = "data_spam";
    protected $fillable = [
        'name',
        'email',
    ];
}
