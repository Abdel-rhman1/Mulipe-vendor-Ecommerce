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

              <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Arabic Product Name</label>
                    <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
                  </div>
                  </div>

                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">English Product Name</label>
                      <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
                    </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label>Unit Name</label>
                       <select name='unit_id' class="form-control">
                          <option value="{{null}}">
                              No Parent Category
                          </option>
                          @foreach($units as $unit)
                              <option value="{{$unit->id}}">
                                  {{$unit->name}}
                              </option>
                          @endforeach
                       </select>
                      </div>
                    </div>



                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label >Category Name</label>
                       <select name='category_id' class="form-control">
                          <option value="{{null}}">
                              No Parent Category
                          </option>
                          @foreach($categories as $category)
                              <option value="{{$category->id}}">
                                  {{$category->name}}
                              </option>
                          @endforeach
                       </select>
                      </div>
                    </div>

                    
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">qty</label>
                        <input name="qty" type="number" class="form-control"  placeholder="Enter Product Name">
                      </div>
                      </div>



                  <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Price</label>
                        <input type="text" name='price' class="form-control" id="exampleInputPassword1" placeholder="Price">
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
                  <div class="col-md-6 col-sm-12 d-flex align-items-center">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </div>
@endsection