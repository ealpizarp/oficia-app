<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $primaryKey="id";
    protected $table = "image";
    protected $fillable = ['path_name','service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
