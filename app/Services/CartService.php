<?php

namespace App\Services;
use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Cart\StoreRequest;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Mail\AddProductToCartNotification;
use Illuminate\Support\Facades\Mail;
use Throwable;

use Carbon\Carbon;

class CartService
{
    protected $cartRepository;
    protected $productRepository;
    protected $cartItemRepository;

    public function __construct (
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        CartItemRepository $cartItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function store(StoreRequest $request) : Cart
    {

        $product = $this->findProduct($request->product_id);
        $cart = $this->findCartByUser($request->user()->id);
        $data=[];
        if (!$cart)
        {
            $data['user_id'] = $request->user()->id;
            $data['comments'] = "se ha creado el carrito de compra";
            $data['active'] = 1;
            $cart = $this->cartRepository->create($data);
        }
        $data=[];
        $cartItem = $this->findCartItemByProduct($product->id, $cart->id);
        if ($cartItem){
            $cartItem->quantity++;
            $cartItem->save();
        }
        if (!$cartItem){
            $data['cart_id'] = $cart->id;
            $data['product_id'] = $product->id;
            $data['quantity'] = $request->quantity;
            $data['price'] = $request->price;
            $cartItem = $this->cartItemRepository->create($data);
        }
        $product->quantity--;
        $product->save();
        //send email to user
        $data = [
            "email" => env('MAIL_FROM_ADDRESS')
        ];

        $data['cart_id'] =  $cart->id;
        $data['user_name'] =  $request->user()->name .' (' . $request->user()->email . ')' ;
        $data['cart_item_id'] =  $cartItem->id;
        $data['cart_item_product_name'] =  $cartItem->product->name;
        $data['cart_item_quantity'] =  $cartItem->quantity;
        $data['cart_item_price'] =  $cartItem->price;
        Mail::to($request->user()->email)->send(new AddProductToCartNotification($data));

        return $cart;
    }

    public function findCartByUser(int $userId):Cart|null
    {
        return $this->cartRepository->findByUserId($userId);
    }

    public function findCartItemByProduct(int $productId, int $cartId):CartItem|null
    {
        return $this->cartItemRepository->findByProductId($productId, $cartId);
    }

    public function findProduct(int $productId):Product
    {
        return $this->productRepository->find($productId);
    }
}
