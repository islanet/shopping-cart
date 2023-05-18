<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    public function getModel()
    {
        return New Cart();
    }

}
