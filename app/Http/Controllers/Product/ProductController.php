<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Validations\Validation;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

use Hash;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.product');
    }
    public function createproduct()
    {
        return view('product.createproduct');
    }
    public function insertproduct(ProductRequest $request) {
        $dataProduct = [
            'productname' => $request->productname,
            'price' => (float)$request->price,
            'discount' => (float)$request->discount,
            'installment' => $request->installment,
            'title' => $request->title,
        ];
        Product::create($dataProduct);

        return redirect('admin/product')->withSuccess('Thêm sản phẩm thành công');
    }
    public function editproduct(Request $request ,$id) {
    
        $product = Product::find($id);
        return view('product.editproduct', ['data' => $product]); 
    }
    public function updateproduct(Request $request, $id){
        $data = Product::find($id);
        $data->productname= $request->productname;
        $data->price= $request->price;
        $data->discount = $request->discount;
        $data->installment= $request->installment;
        $data->title= $request->title;
        $data->save();
        return redirect('admin/product')->withSuccess('Sửa sản phẩm thành công');
    }
    public function deleteproduct(Request $request,$id) {
        Product::where('id', $id)->delete($id);
          return redirect('admin/product');
   }
   public function productlist(Request $request){
    $value = Product::all();
    session()->put('value', $value);
   return view('product.product');
}
}
