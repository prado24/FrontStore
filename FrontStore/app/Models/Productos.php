<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'precio',
        'imagen',
    ];
    public function getUrlImagenAttribute(){
        
        return $this->imagen ? asset("storage/productos/{$this->imagen}"):null;
    }
}
