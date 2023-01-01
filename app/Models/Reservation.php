<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    public $table = 'reservation';

    protected $fillable = [
        'ticket_id',
        'reservation_date',
        'user_id',
        'customer_id'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function user(){
        return $this->BelongsTo(User::class);
    }
    public function custormer(){
        return $this->belongsTo(Customer::class);
    }
}
