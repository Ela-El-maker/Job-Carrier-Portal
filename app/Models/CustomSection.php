<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSection extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'sub_title',
        'button_label',
        'button',
        'media_type',
        'media_path',
    ];
}
