<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'type',
        'imagePath',
        'correction_id',
    ];

    public function correction () {
        return $this->belongsTo(Correction::class);
    }
}
