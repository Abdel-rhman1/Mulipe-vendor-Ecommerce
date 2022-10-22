@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Units</h1>
                  <a href="{{route('unit.create')}}">
                  <button class="btn btn-primary">
                    Add New Unit
                  </button>
                </a>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Units</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <div class="content"></div>   
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Value</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($units as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                @if($item->parentUnit!=null)
                                <td>
                                    {{$item->parentUnit->name}}
                                </td>
                                @else
                                <td>
                                    None
                                </td>
                                @endif
                                <td>
                                  {{$item->equality}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection