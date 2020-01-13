@extends('admin.admin')

@section('title', 'Category')

@section('content')

    <div class="card">
        <div class="card-header">
                <a href="{{ route('admin.category.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Category</a>

            <div class="card-tools input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <br>
        <div class="container text-center">
            <div class="page">
                <div class="table-reponsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col"><span>Edit</span></th>
                            <th scope="col"><span>Delete</span></th>
                            <th scope="col"><span>Name</span></th>
                            <th scope="col"><span>Slug</span></th>
                            <th scope="col"><span>Description</span></th>
                            <th scope="col"><span>Created</span></th>
                            <th scope="col"><span>Updated</span></th>
                            <th colspan="3">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row"></th>
                                <td><a href="{{ route('admin.category.edit', $category->slug) }}" class="btn btn-primary"><i class="fa fa-pen-square"></i></a></td>
                                <td>
                                    {!! Form::open([ 'route' => ['admin.category.destroy', $category]]) !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button onclick="return confirm('Sure delete?')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td><a class="btn btn-default" href="{{route('admin.category.show', $category)}}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
