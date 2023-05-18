<?php

namespace App\Services;
use App\Repositories\ProductRepository;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Models\Product;
class ProductService
{
    protected $productRepo;
    public function __construct (ProductRepository $productRepo ){
        $this->productRepo = $productRepo;
    }
    public function findAll() : Collection
    {
        return $this->productRepo->getAll();

    }

    public function find(int $productId) : Product
    {
        return $this->productRepo->find($productId, ['brand','provider']);

    }
}
