

@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 d-inline">Products</h1>
                  <a href="{{route('product.create')}}">
                  <button class="btn btn-primary">
                      Add New Products
                  </button>
                </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Name_ar</th>
                <th>Name_en</th>
                <th>Category</th>
                <th>Unit</th>
                <th>qty</th>
                <th>price</th>
                <th>Opts</th>
              </tr>
              </thead>
               <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>
                      {{$product->id}}
                    </td>
                    <td>
                      {{$product->name_ar}}
                    </td>

                    <td>
                      {{$product->name_en}}
                    </td>

                    <td>
                      {{$product->category->name}}
                    </td>

                    <td>
                      {{$product->unit->name}}
                    </td>
                    <td>
                      {{$product->qty}}
                    </td>

                    <td>
                      {{$product->price}}
                    </td>
                    <td>
                      <button class="btn btn-primary">
                        <a href="{{route('product.edit' , $product)}}">
                          edit
                        </a>
                      </button>
                      <button class="btn btn-danger DeleteProduct">
                        delete
                      </button>

                    </td>
                  </tr>
                @endforeach
               </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection