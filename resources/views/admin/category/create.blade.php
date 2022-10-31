@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                        <a href="{{ route('category.index') }}">
                            <button class="btn btn-primary">
                                Categories
                            </button>
                        </a>
                    </div>

                    @if (Session::has('successMsg'))
                        <div class="text-center alert alert-success">
                            {{ Session::get('successMsg') }}
                        </div>
                    @endif
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Cat Form</h3>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter Category Name">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name='parent_category_id' class="form-control">
                                    <option value="{{ null }}">
                                        No Parent Category
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
            </form>
        </div>
    </div>
@endsection
