<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository extends BaseRepository
{
    public function getModel()
    {
        return New CartItem();
    }
    public function findByProductId($productId, $cartId)
    {
        return CartItem::where('product_id',$productId)->where('cart_id',$cartId)->first();
    }

}
