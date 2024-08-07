@extends('admin.main')
@section('head')

{{--    <script src="/template/tinymce.min.js"></script>--}}
@endsection
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="menu" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="menu">Danh Mục</label>
                    <select class="form-control" name="parent_id">
                            <option value="0">Danh Mục Cha</option>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả ngắn</label>
                    <textarea name="description" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Ảnh Minh Hoạ</label>
                    <input type="file"  class="form-control" id="upload">
                    <div id="image_show">

                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
                <div class="form-group">

                    <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="radio" id="active" name="active" value="1" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="radio" id="no_active" name="active" value="0">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                    </div>
                </div>

            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Mới Danh Mục</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
@section('footer')

@endsection
