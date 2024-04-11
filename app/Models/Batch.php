<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sent',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function corrections(){
        return $this->hasMany(Correction::class);
    }
}
