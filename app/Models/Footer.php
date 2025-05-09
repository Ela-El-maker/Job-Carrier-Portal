<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'background_footer',
        'details',
        'copyright',
        'address',
        'email',
        'phone'
    ];
}
