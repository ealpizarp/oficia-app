<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $table = "service";
    protected $fillable = ["name",'description','warranty','free_diagnosis','reasons_to_choose','locations_directions','address_id','subcategory_id','user_id',];
    


    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'service_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'service_id', 'id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'service_id', 'id');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['address'] ?? false) {
        
            $query->whereIn('address_id', Address::where('name', 'LIKE', '%' . request('address') . '%')->pluck('id'))->get();

        }

        if($filters['subcategory'] ?? false) {
        
            $query->whereIn('subcategory_id', Subcategory::where('name', 'LIKE', '%' . request('subcategory') . '%')->pluck('id'))->get();

        }
        
        if($filters['search'] ?? false) {

            $query->join('address', 'address.id', '=', 'service.address_id')
            ->join('subcategory', 'subcategory.id', '=', 'service.subcategory_id')
            ->selectRaw('service.*')
            ->where('service.name', 'like', '%' . request('search') . '%')
            ->orWhere('service.description', 'like', '%' . request('search') . '%')
            ->orWhere('address.name', 'like', '%' . request('search') . '%')
            ->orWhere('subcategory.name', 'like', '%' . request('search') . '%');
        }

    }

}

