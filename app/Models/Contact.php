<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'name',
        'contact',
        'note',
        'user_id',
    ];

    // Define any relationships (example: a contact belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
