<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'cateory_id',
        'name',
        'slug',
        'description',
        'price',
        'size',
        'weight',
    ];

    protected $searchableFields = ['*'];
}
