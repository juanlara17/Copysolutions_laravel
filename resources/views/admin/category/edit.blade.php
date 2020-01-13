@extends('admin.admin')

@section('title', 'Edit Category')

@section('content')

    <div id="apicategory">
        <form action="{{ route('admin.category.update', $cat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div id="nameTemp" v-show="false">{{ $cat->name }}</div>
            <!-- Default box -->
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

                               @blur="getCategory"
                               @focus="div_aparecer=false"

                               class="form-control" type="text" name="name" id="name">
                        <label for="slug">Slug</label>
                        <input readonly v-model="generarSLug" class="form-control" type="text" name="slug" id="slug">
                        <div v-if='div_aparecer' v-bind:class="div_clase_slug">
                            @{{ div_mensaje_slug }}
                        </div>
                        <br v-if='div_aparecer'>
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="5">{{ $cat->description }}</textarea>

                    </div>
                    <br>
                    <br>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn badge-danger" href="{{ route('cancel','admin.category.index') }}">Cancel</a>
                    <input :disabled="disable_button==1" type="submit" value="Save" class="btn btn-primary float-right">
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </form>
    </div>
@endsection
