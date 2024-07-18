@extends('admin.main')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>STT</th>
                <th>Role Name</th>

                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roleList as $item)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $item->role_name }}</td>
                    <td><a href="{{ route('permission_setting') }}?id={{ $item->id }}"><button class="btn btn-warning">Setting Permission</button></a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <!-- form start -->

    </div>
@endsection

