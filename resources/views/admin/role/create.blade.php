
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Units</h1>
                  <a href="{{route('unit.index')}}">
                  <button class="btn btn-primary">
                    Units
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Unit Form</h3>
              </div>

              <form action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">

                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Role Name</label>
                      <input name="name" type="text" class="form-control"  placeholder="Enter Category Name">
                    </div>
                  </div>
                 
              

                  @foreach ( config('abilities') as $code=>$item )
                        <div class="row">
                            <div class="col-sm-6 my-2">
                                {{$code}}
                            </div>

                            <div class="col-sm-2">
                                <input type="radio" value="allow" name="abilities[{{$code}}]">
                                Allow
                            </div>


                            <div class="col-sm-2">
                                <input type="radio" value="deny" name="abilities[{{$code}}]">
                                deny
                            </div>
                        </div>
                  @endforeach
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
    </div>
@endsection