<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['order_id', 'product_id', 'qty', 'price'];

    protected $searchableFields = ['*'];

    protected $table = 'order_products';
}
