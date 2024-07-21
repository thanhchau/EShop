@extends('admin.main')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>STT</th>
                <th>Route Name</th>
                <th>Route Title</th>
                <th>&nbsp;Select</th>
            </tr>
            </thead>
            <tbody>

            @foreach($permissionList as $item)

                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $item['route_name'] }}</td>
                    <td>{{ $item['route_title'] }}</td>
                    <td>
                        <select class="form-control" name="status" onchange="UpdatePermission(this,{{ $item['route_id'] }},{{ $role_id }})">
                            <option value="1" {{ $item['status'] == 1 ?'selected':''}}>Enable</option>
                            <option value="0" {{ $item['status'] == 0?'selected':''}}>Disable</option>
                        </select>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <!-- form start -->

    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        function UpdatePermission(that, routeId,roleId){
            status = $(that).val();
            $.post('{{ route('permission_save') }}',{
                '_token': '{{ csrf_token() }}',
                'status': status,
                'route_id': routeId,
                'role_id': roleId,
            },function (data){

            })
        }
    </script>
@endsection

