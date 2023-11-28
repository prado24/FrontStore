<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Productos extends Model
{
    public function tallas()
    {
        return $this->belongsTo(Tallas::class);
    }
    use HasFactory;
    protected $fillable = [
        'titulo',
        'precio',
        'resumen',
        'tallas_id',
        'imagen',
    ];
    public function getUrlImagenAttribute(){
        
        return $this->imagen ? asset("storage/productos/{$this->imagen}"):null;
        // return $this->imagen ? asset("/storage/app/public/productos/{$this->imagen}"):null;
    }
}
