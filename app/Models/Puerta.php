<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puerta extends Model
{
    use HasFactory;
    protected $table='puerta';
    protected $primaryKey = 'id';
    public $timestamps=true;
    protected $fillable=['id','created_at','updated_at','puerta','usuario_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
