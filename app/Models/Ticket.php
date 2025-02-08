<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ticket extends Model  implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['user_id', 'subject', 'message', 'encrypted_message', 'status' ];


    protected $casts = [
        'encrypted_message' => 'encrypted', //encrypt/decrypt
    ];
}
