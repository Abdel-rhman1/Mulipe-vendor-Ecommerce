@extends('admin.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Products</h1>
              <a href="{{route('product.create')}}">
              <button class="btn btn-primary">
                Products
              </button>
            </a>
            </div>
          
            @if(Session::has('successMsg'))
                <div class="text-center alert alert-success">
                    {{Session::get('successMsg')}}
                </div>
            @endif
          </div>
        </div>
      </div>
    <div class="content"></div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>

          <form action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
              <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Arabic Product Name</label>
                <input name="name_ar" value={{$product['name_ar']}} type="text" class="form-control @error('name_ar') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Product Name">
              
                @error('name_ar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{Lang::get("name_en")}}</label>
                  <input name="name_en" value={{$product['name_en']}} type="text"
                  
                  class="form-control @error('name_en') is-invalid @enderror"
                  id="exampleInputEmail1" placeholder="Enter Product Name">
                  @error('name_en')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                </div>

                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>Unit Name</label>
                   <select name='unit_id' class="form-control @error('unit_id') is-invalid @enderror">
                      <option value="{{null}}">
                          No Parent Category
                      </option>
                      @foreach($units as $unit)
                          <option value="{{$unit->id}}" {{$unit->id == $product['unit_id'] ? 'selected':''}}>
                              {{$unit->name}}
                          </option>
                      @endforeach
                      @error('unit_id')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                   </select>
                  </div>
                </div>



                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label >Category Name</label>
                   <select name='category_id' class="form-control @error('category_id')
                   is-invalid
                   @enderror">
                      <option value="{{null}}">
                          No Parent Category
                      </option>
                      @foreach($categories as $category)
                          <option value="{{$category->id}}" {{$category->id == $product['category_id'] ? 'selected':''}}>
                              {{$category->name}}
                          </option>
                      @endforeach
                   </select>

                   @error('category_id')
                      <div class="text-danger">{{ $message }}</div>
                   @enderror
                  </div>
                </div>

                
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">qty</label>
                    <input name="qty" type="number" value="{{$product['qty']}}" class="form-control @error('qty')
                    is-invalid
                    @enderror"  placeholder="Enter Product Name">

                    @error('qty')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>



              <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="text" value="{{$product['price']}}" name='price' class="form-control @error('price')
                    is-invalid
                    @enderror" id="exampleInputPassword1" placeholder="Price">

                    @error('price')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>     
              </div>


              <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="exampleInputFile">Product Iamge</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="files[]"  class="custom-file-input" multiple>
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>

                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
</div>
@endsection