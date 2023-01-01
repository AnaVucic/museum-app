<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $table = 'customer';

    protected $fillable = [
        'firstname',
        'lastname',
        'email'
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
