<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //DEBEMOS CREAR ESTA VARIABLE CON LOS DATOS QUE DEBEMOS ENVIAR A LA TABLA POST, SI NO LO HACEMOS, NOS ENVIARA UN ERROR
    //EL NOMBRE QUE LE PODEMOS AQUI DEBE CONCORDAR CON EL NOMBRE DE LAS COLUMNAS DE LA BASE DE DATOS YA QUE AQUI LE DECIMOS
    //QUE COLUMNAS PODRAN SER INSETADAS, MODIFICADAS, ETC
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description', 'posted', 'image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
