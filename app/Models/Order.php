<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use   HasFactory;


    /**
     * @var mixed
     */
    private $product_id;
    /**
     * @var mixed
     */
    private $user_id;
    /**
     * @var mixed
     */
    private $phone;
    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $address;
    /**
     * @var mixed
     */
    private $quantity;

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function orderItem(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\OrderItem');
    }
}
