<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Validations\Validation;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface; 

use Hash;

class ShopController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function searchProduct(Request $request)
    {
        if($request->has('key')){
        $product = Product::where('productname','like','%'.$request->key.'%')
                            ->orwhere('price','like','%'.$request->key.'%')
                            ->get();
        }
        return view('product.searchProduct',compact('product'));
    }
    public function productDetail(Request $request ,$id)
    {
        $productDetail = Product::where('id', $id)->first();
        return view('product.productDetail',compact('productDetail'));
    }
    public function category(Request $request)
    {
        if($request->has('iphone')){
        $category= Product::where('productname','iphone')->get();
    }
    return view('product.category', compact('category'));
    }
    public function productList(Request $request)
    {
    $pd = $this->productRepository->productList();
    
    // session()->put('value', $value);
        return view('product.index',compact('pd'));
    }
}
