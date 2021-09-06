<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductRepository implements ProductRepositoryInterface
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function insertProduct($product=[])
    {
        return $this->product->create($product);
    }
    public function editProduct($id)
    {
        return $this->product->find($id);
    }
    public function updateProduct($id, $product=[])
    {
        return $this->product->where('id', $id)->update($product);
    }
    public function deleteProduct($id)
    {
        return $this->product->where('id', $id)->delete();
    }
    public function search()
    {
        return $this->product->where('productname')->get();
    }
    public function productList()
    {
        return $this->product->orderBy('id','DESC')->get();
    }
}