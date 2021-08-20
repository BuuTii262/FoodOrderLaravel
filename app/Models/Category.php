<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory, HasUuid;
    protected $table = 'categories';

    protected $fillable = ['name', 'category_image', 'status'];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    
}
