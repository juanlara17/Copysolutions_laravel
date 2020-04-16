@extends('admin.admin')

@section('title', 'Edit Product')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
@endsection
@section('content')
    <div id="apiproduct">
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data Automatic</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visits</label>
                                        <input class="form-control" type="number" id="visits" name="visits" readonly value="{{ $product->visits }}">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sales</label>
                                        <input class="form-control" type="number" id="sales" name="sales" readonly value="{{ $product->sales }}">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input
                                            v-model="nombre"
                                            @blur="getproduct"
                                            @focus="div_aparecer = false"
                                            class="form-control" type="text" id="name" name="name"
                                            value="{{ $product->name  }}"
                                        >
                                        <label>Slug</label>
                                        <input
                                            readonly
                                            v-model="generarSLug"
                                            class="form-control" type="text" id="slug" name="slug"
                                        >
                                        <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                                            @{{ div_mensaje_slug }}
                                        </div>
                                        <br v-if="div_aparecer">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id"  id="category_id" class="form-control" style="width: 100%;">
                                            @foreach($categories as $category)
                                                @if ($category->id == $product->category_id)
                                                    <option value="{{ $category->id }}"
                                                            selected="selected">{{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label>Quantity</label>
                                        <input class="form-control" type="number" id="quantity" name="quantity" value="{{ $product->quantity  }}">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>

                    <!-- /.card -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Price Section</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Old Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input v-model="price_old" class="form-control" type="number" id="price_old"
                                                   name="price_old" min="0" value="0" step=".01">
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Current Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input v-model="price" class="form-control" type="number" id="price" name="price"
                                                   min="0" value="0" step=".01">
                                        </div>
                                        <br>
                                        <span id="promo"></span>
                                        @{{ generardescuento }}
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Promo Price</label>
                                        <div class="input-group">
                                            <input v-model="promo_price" v-model class="form-control" type="number" id="percent_promo"
                                                   name="percent_promo" step="any" min="0" max="100" value="0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="progress">
                                            <div id="progressbar" class="progress-bar" role="progressbar"
                                                 v-bind:style="{width: promo_price + '%'}"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                @{{ promo_price }} %
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Description</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description"
                                                  rows="3">
                                            {!! $product->description !!}
                                        </textarea>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Large Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description"
                                                  rows="5">{{ $product->name }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Specifications / Interest Data</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Specifications</label>
                                        <textarea class="form-control ckeditor" name="extract" id="extract"
                                                  rows="3">
                                            {!! $product->extract !!}
                                        </textarea>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Interest Data</label>
                                        <textarea class="form-control ckeditor" name="extract" id="extract"
                                                  rows="5"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Images</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="images">Add images</label>
                                <input type="file" class="form-control-file" id="images[]" name="images[]" multiple
                                       accept="image/*">

                                <div class="description">
                                    Limited number can be load
                                    <br>
                                    Limite 2048MB
                                    <br>
                                    Format: jpeg, png, jpg, gif, svg.
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    {{--  Image Gallery  --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                Gallery
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($product->images as $image)
                                    <div id="idimage-{{ $image->id }}" class="col-sm-2">
                                        <a href="{{ $image->url }}" data-toggle="lightbox" data-title="{{ $image->id }}" data-gallery="gallery">
                                            <img src="{{ $image->url }}" class="img-fluid mb-2" alt="white sample" style="width: 150px; height: 150px"/>
                                        </a>
                                        <hr>
                                        <a href="{{ $image->url }}" class="btn btn-danger"
                                            v-on:click.prevent="deleteImageProduct({{ $image }})"
                                            >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Administration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                            <select name="state"  id="state" class="form-control" style="width: 100%;">
                                                @foreach($states_product as $state_product)
                                                    @if ($state_product == $product->state)
                                                        <option value="{{ $state_product }}"
                                                                selected="selected">{{ $state_product }}</option>
                                                    @else
                                                        <option value="{{ $state_product }}">{{ $state_product }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="active" name="active"
                                                @if($product->visible)
                                                    checked
                                                @endif
                                            >
                                            <label class="custom-control-label" for="active">Active</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="slide_principal"
                                                   name="slide_principal"
                                                @if($product->slide_principal)
                                                    checked
                                                @endif
                                            >
                                            <label class="custom-control-label" for="slide_principal">Show Slide
                                                principal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a class="btn btn-danger" href="{{ route('cancel','admin.product.index') }}">Cancel</a>
                                        <input :disabled="disable_button==1"
                                               type="submit" value="Save" class="btn btn-primary float-right">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </form>
    </div>
@endsection
@section('scripts')
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script>
        window.data = {
            edit: 'Si',
            datos: {
                "name" : "{{ $product->name }}",
                "price_old": "{{ $product->price }}",
                "promo_percent": "{{ $product->percent_promo }}"
            }
        };

        $(function () {

            //Initialize Select2 Elements
            $('#category_id').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            //Use Lightbox
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        });
    </script>
@endsection
