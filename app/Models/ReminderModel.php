<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderModel extends Model
{
    use HasFactory;
    protected $table='reminders';
    protected $fillable = [
        'date',
        'subject',
        'description',
        'email',
        'contactNo',
        'smsNo',
        'reoccur'
    ];
}
