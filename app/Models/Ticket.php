<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Exhibition;



class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'ticket_comment',
        'exhibition_id'
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
    public function exhibition(){
        return $this->belongsTo(Exhibition::class);
    }
}
