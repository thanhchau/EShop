@extends('admin.main')
@section('head')

    {{--    <script src="/template/tinymce.min.js"></script>--}}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Menu</th>
                    <th>price </th>
                    <th>price_sale</th>
                    <th>active</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=> $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->menu->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->price_sale }}</td>
                        <td>{!! \App\Helper\Menu\Helper::Active($product) !!} </td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a href="/admin/products/edit/'.{{ $product->id }}.'" class="btn btn-success btn-sm"> <i class="fas fa-edit"></i> </a>
                            <a href="#" onclick="Remove({{ $product->id }}, 'admin/products/destroy')" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach




                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('footer')
    <script>


    </script>
@endsection
