<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'status'];

    //من خلال هذه الدالة يمكننا الربط بين المستخدم والمشاريع 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //من خلال هذه الدالة يمكننا الربط بين المهمة المشروع 

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
