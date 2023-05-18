<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\ProductService;
use Carbon\Carbon;

class ProductController extends Controller
{
    protected $productService;
    public function __construct (ProductService $productService ){
        $this->productService = $productService;
    }
    public function list(Request $request): View
    {

        $products =  $this->productService->findAll();
        /*if ($request->ajax()){
            return view('product.table', [
                'activities' => $activities
            ]);
        }*/
        return view('product.list', [
            'products' => $products
        ]);
    }
    public function show(int $productId): View
    {
        $product =  $this->productService->find($productId);
        return view('product.show', [
            'product' => $product
        ]);
    }
}
