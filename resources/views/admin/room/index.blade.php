@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ $title }}</li>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ route('admin.room.edit') }}" class="btn btn-md btn-outline-secondary">+ Oda
                                Ekle</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Otel Adı</th>
                                    <th>Oda Adı</th>
                                    <th>Stok Sayısı</th>
                                    <th>Dönem</th>
                                    <th width="115"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roomCursor as $room)
                                    <tr>
                                        <td>
                                            <i
                                                class="nav-icon far fa-circle text-{{ statusCSS($room->status) }}"></i>
                                        </td>
                                        <td>{{ $room->hotel_id }}</td>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->stock }}</td>
                                        <td>
                                            <a href="{{ route('admin.term.edit', ['obj' => 'HOTEL', 'obj_id' => $room->id]) }}"
                                               class="btn btn-sm btn-outline-primary j-modal">Ekle</a>
{{--                                            @forelse ($term_[$room->id] as $term)--}}
{{--                                                <a href="{{ route('admin.term.edit', ['obj' => 'HOTEL', 'obj_id' => $room->id, 'term_id' => $term->id]) }}"--}}
{{--                                                   class="btn btn-outline-secondary btn-sm j-modal">{{ $term->showDates() }}</a>--}}
{{--                                            @empty--}}

{{--                                            @endforelse--}}
                                        </td>
                                        <td style="text-align: right">
                                            <a href="{{ route('admin.room.edit', ['room_id' => $room->id]) }}"
                                               class="btn btn-outline-primary btn-md">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.room.delete', ['room_id' => $room->id]) }}"
                                               class="btn btn-outline-danger btn-md">
                                                <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
