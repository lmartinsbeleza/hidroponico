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
        "hidroponia_id",
        "ph",
        "temperatura_agua",
        "condutividade",
        "temperatura_ambiente",
        "luminosidade",
        "nivel_baixo",
        "nivel_alto",
    ];
}
