<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $sub_cat_id;
    /**
     * @var mixed
     */
    private $price;
    /**
     * @var mixed|null
     */
    private $img;

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Order');
    }
    public function order_items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}
