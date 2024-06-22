<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'scinces'];
    // protected $tabel = 'teachers';//agar model nomi jadvak nomini birlik shakli bo'lmas uni ko'rsatish kerak.
    // protected $primary_key = 'flight_id'; //bunda ustunni id ga yo'llanma beriladi.

}
