<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Food extends Model
{
    use HasFactory, HasUuid;
    protected $table = 'food';

    protected $fillable = [
        'name', 
        'food_image', 
        'category_id', 
        'price',
        'description',
        'have',
        'status'];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    public function categories()
    {
        return $this->hasMany(Category::class,'uuid','category_id');
    }
}
