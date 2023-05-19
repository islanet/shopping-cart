<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\CartService;
use Carbon\Carbon;
use App\Http\Requests\Cart\StoreRequest;
use Illuminate\Http\JsonResponse;


class CartController extends Controller
{
    protected $cartService;
    public function __construct (CartService $cartService ){
        $this->cartService = $cartService;
    }

    public function store(StoreRequest $request)
    {
        $cart =  $this->cartService->store($request);
        return response()->json(["url" => route('product.list')]);
    }
}
