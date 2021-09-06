<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Product;
interface ProductRepositoryInterface
{
    public function insertProduct($product);
    public function editProduct($id);
    public function updateProduct($id ,$product);
    public function deleteProduct($id);
    public function search();
    public function productList();

}
