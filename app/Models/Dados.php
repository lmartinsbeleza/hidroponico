<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dados extends Model
{
    use HasFactory, Notifiable;
    protected $table = "dados";
    protected $fillable = [
        "ph",
        "temperatura",
        "condutividade",
        "hidroponia_id"
    ];
}
