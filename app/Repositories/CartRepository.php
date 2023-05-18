<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    public function getModel()
    {
        return New Cart();
    }

    public function findByUserId($userId)
    {
        return Cart::where('user_id',$userId)->where('active',1)->first();
    }

}
