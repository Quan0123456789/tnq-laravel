@extends('layout')
@section('content')
<main class="create-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Thêm sảm phẩm</div>
                  <div class="card-body">
  
                      <form action="{{ route('insertproduct')  }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="productname" class="col-md-4 col-form-label text-md-right">ProductName</label>
                              <div class="col-md-6">
                                  <input type="text" id="productname" class="form-control" name="productname" required autofocus>
                                  @if ($errors->has('productname'))
                                      <span class="text-danger">{{ $errors->first('productname') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                              <div class="col-md-6">
                                  <input type="text" id="price" class="form-control" name="price" required autofocus>
                                  @if ($errors->has('price'))
                                      <span class="text-danger">{{ $errors->first('price') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="discount" class="col-md-4 col-form-label text-md-right">Discount</label>
                              <div class="col-md-6">
                                  <input type="discount" id="discount" class="form-control" name="discount" required>
                                  @if ($errors->has('discount'))
                                      <span class="text-danger">{{ $errors->first('discount') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input type="description" id="description" class="form-control" name="description" required>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input type="title" id="title" class="form-control" name="title" required>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Creat
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection