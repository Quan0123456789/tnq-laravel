<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Validations\Validation;
use App\Http\Requests\InsertRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface; 

use Hash;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return view('product.product');
    }
    public function createProduct()
    {
        return view('product.createproduct');
    }
    public function insertProduct(InsertRequest $request) {
        
        $product = $request->all();
        if($request->has('image')){
            $file = $request->image;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('upload'),$fileName);
        }
        if(isset($fileName)) { 
        $product['image'] = $fileName;
        }    
        $product = $this->productRepository->insertProduct($product);
        return redirect('admin/product')->withSuccess('Thêm sản phẩm thành công');
    }
    public function editProduct(Request $request ,$id) {
        $product = $this->productRepository->editProduct($id);
        return view('product.editproduct', ['product' => $product]); 
    }
    public function updateProduct(Request $request, $id){

        $dataUpdate = [
            "productname" => $request->productname,
            "price" => $request->price,
            "discount" => $request->discount,
            "description" => $request->description, 
            "title" => $request->title,
        ];
        $dataUpdate = $request->except(['_token']);
        if($request->has('image')){
            $file = $request->image;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('upload'),$fileName);
        }
        if(isset($fileName)) { 
        $dataUpdate['image'] = $fileName;
        }
        $product = $this->productRepository->updateProduct($id, $dataUpdate);
        return redirect('admin/product')->withSuccess('Sửa sản phẩm thành công');
    }
    public function deleteProduct($id) {
        $this->productRepository->deleteProduct($id);
          return redirect('admin/product');
   }
   public function productList(Request $request){
    $value = $this->productRepository->productList();
    session()->put('value', $value);
   return view('product.product');
}
}
