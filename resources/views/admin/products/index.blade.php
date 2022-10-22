

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
                  </tr>
                @endforeach
                  
               </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection