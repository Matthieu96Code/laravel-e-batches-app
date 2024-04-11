<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'batches',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }
}
