@extends('admin.main')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

                {!! \App\Helper\Menu\Helper::Menu($menus) !!}
            </tbody>
        </table>
        <!-- form start -->

    </div>
@endsection

