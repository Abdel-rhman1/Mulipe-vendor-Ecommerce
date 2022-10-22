
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
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Unit Form</h3>
              </div>

              <form action="{{route('unit.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">

                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">unit Name</label>
                      <input name="name" type="text" class="form-control"  placeholder="Enter Category Name">
                    </div>
                  </div>
                 
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Unit Name</label>
                     <select name='parent_unit_id' class="form-control">
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
                      <label for="exampleInputEmail1">Base Value</label>
                      <input name="value" type="text" class="form-control"  placeholder="Enter Base Unit Value">
                    </div>
                  </div>

                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
    </div>
@endsection