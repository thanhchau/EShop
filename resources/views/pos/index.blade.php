<!DOCTYPE html>
<html>
@include('pos.head')
<body>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
@include('pos.navbar')
<div class="container-fluid">
    <div class="row">
        @include('pos.cart')
        <div class="col col-8">
            <div class="row" id="data_list">
                @foreach($datalist as $item)
                    <div class="col-md-4 item" style="text-align: center;" field-thumbnail="{{ $item->thumb }}" field-price="{{ $item->price }}" field-title = "{{ $item->description }}" field-id = "{{ $item->id }}">
                        <img src="{{ $item->thumb }}" style="width: 100%;">
                        <p>{{ $item->category_name }}</p>
                        <p style="font-weight: bold;">{{ $item->description }}</p>
                        <p style="color: red">{{ number_format($item->price) }} vnd</p>
                    </div>
                @endforeach
            </div>
            <div id="paging">
                {{ $datalist->links() }}
            </div>

        </div>
    </div>
</div>
{{-- cookie & session & localStorage (JS) --}}
@include('pos.footer')
</body>
</html>
