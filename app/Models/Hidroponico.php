<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hidroponico extends Model
{
    use HasFactory, Notifiable;
    protected $table = "hidroponia";
    protected $fillable = [
        'plantacao'
    ]; 
}
