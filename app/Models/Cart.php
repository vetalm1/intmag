<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'identifier',
        'product_id',
        'name',
        'price',
        'quantity',
    ];

    protected $searchableFields = ['*'];
}
