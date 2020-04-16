@extends('admin.admin')

@section('title', 'Show Category')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="nombre"
                       readonly="readonly"
                       value="{{ $cat->name }}"
                       @blur="getCategory"
                       @focus="div_aparecer=false"

                       class="form-control" type="text" name="name" id="name">
                <label for="slug">Slug</label>
                <input value="{{ $cat->slug }}" readonly="readonly"  v-model="generarSLug" class="form-control" type="text" name="slug" id="slug" >
                <br v-if='div_aparecer'>
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" readonly="readonly"
                          rows="5">{{ $cat->description }}</textarea>
            </div>
            <br>
            <br>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn badge-danger" href="{{ route('cancel','admin.category.index') }}">Cancel</a>
            <a class="btn btn-outline-success float-right" href="{{ route('admin.category.edit', $cat->slug) }}">Edit</a>
        </div>
        <!-- /.card-footer-->
    </div>

@endsection
