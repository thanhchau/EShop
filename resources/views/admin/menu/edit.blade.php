@extends('admin.main')
@section('head')
    <script src="https://cdn.tiny.cloud/1/f4mpdimv2dbub7g4t4p43dlqdtbob7oshhtd8jz8e6ol7pxj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
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
                    <input type="text" class="form-control" name="name" value="{{ $menu->name }}" id="menu" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="menu">Danh Mục</label>
                    <select class="form-control" name="parent_id">
                        <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh Mục Cha</option>
                        @foreach($menus as $item)
                            <option value="{{ $item->id }}" {{ $menu->parent_id == $item->id ? "selected" : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả ngắn</label>
                    <textarea name="description"  class="form-control" >{{ $menu->description }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả chi tiết</label>
                    <textarea name="content" id="content1" class="form-control">{{ $menu->content }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Ảnh Minh Hoạ</label>
                    <input type="file"  class="form-control" id="upload">
                    <div id="image_show">
                        <img src="{{ $menu->thumb ? $menu->thumb: '' }}" width="100px"/>
                    </div>
                    <input type="hidden" name="thumb" id="thumb" value="{{ $menu->thumb ? $menu->thumb: '' }}">
                </div>
                <div class="form-group">

                    <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="radio" id="active" name="active" value="1" {{ $menu->active==1?'checked':'' }}>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="radio" id="no_active" name="active" value="0" {{ $menu->active==0?'checked':'' }}>
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                    </div>
                </div>

            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Câp nhật Danh Mục</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
@section('footer')
    <script>

        tinymce.init({
            selector: 'textarea#content',
            license_key: 'f4mpdimv2dbub7g4t4p43dlqdtbob7oshhtd8jz8e6ol7pxj'
        });
    </script>
@endsection
