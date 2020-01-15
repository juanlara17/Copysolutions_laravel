@extends('admin.admin')

@section('title', 'Create Product')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <div id="apiproduct">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data automatic</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visits</label>
                                        <input class="form-control" type="number" id="visits" name="visits">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sales</label>
                                        <input class="form-control" type="number" id="sales" name="sales">
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
                            <h3 class="card-title">Product detail</h3>
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
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            @foreach($categories as $category)
                                                @if ($loop->first)
                                                    <option value="{{ $category->id }}"
                                                            selected="selected">{{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label>Quantity</label>
                                        <input class="form-control" type="number" id="quantity" name="quantity">
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
                            <h3 class="card-title">Price section</h3>
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
                                            <input class="form-control" type="number" id="oldprice"
                                                   name="oldprecio" min="0" value="0" step=".01">
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Precio actual</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input class="form-control" type="number" id="precioactual" name="precioactual"
                                                   min="0" value="0" step=".01">
                                        </div>
                                        <br>
                                        <span id="promo"></span>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Porcentaje de descuento</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" id="porcentajededescuento"
                                                   name="porcentajededescuento" step="any" min="0" min="100" value="0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="progress">
                                            <div id="barraprogreso" class="progress-bar" role="progressbar"
                                                 style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                0%
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
                                    <h3 class="card-title">Descripciones del product</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Descripción corta:</label>
                                        <textarea class="form-control" name="descripcion_corta" id="descripcion_corta"
                                                  rows="3"></textarea>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Descripción larga:</label>
                                        <textarea class="form-control" name="descripcion_larga" id="descripcion_larga"
                                                  rows="5"></textarea>
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
                                    <h3 class="card-title">Especificaciones y otros datos</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Especificaciones:</label>
                                        <textarea class="form-control" name="especificaciones" id="especificaciones"
                                                  rows="3"></textarea>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Datos de interes:</label>
                                        <textarea class="form-control" name="datos_de_interes" id="datos_de_interes"
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
                            <h3 class="card-title">Imagenes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="archivosimagenes">Subir varias imagenes</label>
                                <input type="file" class="form-control-file" id="archivosimagenes[]" multiple
                                       accept="image/*">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Administración</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input class="form-control" type="text" id="estado" name="estado" value="Nuevo">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="activo" name="activo">
                                            <label class="custom-control-label" for="activo">Activo</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="sliderprincipal"
                                                   name="sliderprincipal">
                                            <label class="custom-control-label" for="sliderprincipal">Aparece en el Slider
                                                principal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a class="btn btn-danger" href="{{ route('cancel','admin.product.index') }}">cancel</a>
                                        <input
                                            type="submit" value="Guardar" class="btn btn-primary">
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
