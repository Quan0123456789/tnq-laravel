<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Users;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use Hash;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.home');
    }
    public function create()
    {
        return view('blog.registrationblog');
    }
    public function insert(Request $request) {
        $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::create(request([ 'name' , 'email', 'password']));
        return redirect('admin/users')->withSuccess('Thêm thành viên thành công');
    }
    public function edit(Request $request ,$id) {
    
        $user = User::find($id);
        return view('blog.edit', ['data' => $user]); 
    }
    public function update(Request $request, $id){
        $data = User::find($id);
        $data->name= $request->name;
        $data->email= $request->mail;
        $data->password = $request->password;
        $data->save();
        return redirect('admin/users')->withSuccess('Sửa thành viên thành công');
    }
    public function delete(Request $request,$id) {
        User::where('id', $id)->delete($id);
          return redirect('admin/users');
   }
   public function users_list(Request $request){
    $value = User::all();
    session()->put('value', $value);
   return view('blog.home');
}
}
