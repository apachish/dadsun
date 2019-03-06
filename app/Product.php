<?php

namespace App;

use App\Service\ProductService;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ProductService;

    protected $fillable = ['title','description','image'];
    public function  user()
    {
        return $this->belongsTo(User::class);
    }
}
