<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    public $table = 'exhibition';

    protected $fillable = [
        'name',
        'address',
        'description'
    ];

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
