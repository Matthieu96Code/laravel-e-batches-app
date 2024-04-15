<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'batch_id',
    ];

    public function batch () {
        return $this->belongsTo(Batch::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
