@extends('admin.admin')

@section('title', 'Products')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    {{ $products[5] }}

    <div id="confirmdelete" class="row">
        <span v-show="false" id="urlbase"> {{ route('admin.product.index') }}</span>
        @include('custom.modal_delete')
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="padding-left: 7.5px; padding-right: 7.5px">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Product</a>
                    <form class="float-right">
                        <div class="card-tools input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="name" class="form-control float-right" placeholder="Search" value="{{ request()->get('name') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
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
                                    <th scope="col"><span>Image</span></th>
                                    <th scope="col"><span>Name</span></th>
                                    <th scope="col"><span>State</span></th>
                                    <th scope="col"><span>Visible</span></th>
                                    <th scope="col"><span>Slider</span></th>
                                    <th scope="col"><span>Created</span></th>
                                    <th scope="col"><span>Updated</span></th>
                                    <th scope="col"><span>Detail</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row"></th>
                                        <td><a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-primary"><i class="fa fa-pen-square"></i></a></td>
                                        <td>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger"
                                               v-on:click.prevent="get_delete({{ $product->id }})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if( $product->images->count()<=0 )
                                                <img src="/images/avatar.png" alt="image_product" style="height: 70px">
                                            @else
                                                <img src="{{ $product->images->random()->url }}" alt="image_product" style="height: 70px" >
                                            @endif
                                        </td>

                                        {{--<td><img src="{{ $product->image }}" alt="image_product" width="40"></td>--}}
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->state }}</td>
                                        <td>{{ $product->visible }}</td>
                                        <td>{{ $product->slide_principal }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td><a class="btn btn-default" href="{{route('admin.product.show', $product->slug)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        {{--<td>
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bootstrap Switch</h3>
                                                </div>
                                                <div class="card-body">
                                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                                </div>
                                            </div>
                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $products->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

