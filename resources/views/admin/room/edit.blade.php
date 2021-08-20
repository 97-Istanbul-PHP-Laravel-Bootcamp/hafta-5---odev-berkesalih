@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.room') }}">Odalar</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
@endsection
@php
    if ($room->info_s)
        {
    $deneme = array_keys($room->info_s);
        }
        else{
            $deneme = [];
        }
@endphp
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <form method="post" action="{{ route('admin.room.save') }}">
                            @csrf
                            @if ($room)
                                <input type="hidden" name="id" value="{{ $room->id }}">
                            @endif
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Otel Adı</label>
                                    <select class="form-control" name="hotel_id" id="exampleSelectBorder">
                                        @foreach($hotel as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Oda Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{ $room->name }}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Stok Sayısı</label>
                                    <input type="text" class="form-control" name="stock" value="{{ $room->stock }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>Yetişkin Sayısı</label>
                                    <input type="text" class="form-control" name="adt_Cnt"
                                           value="{{ $room->adt_cnt }}">
                                </div>

                                <div class="form-group">
                                    <label>Çocuk Sayısı</label>
                                    <input type="text" class="form-control" name="kid_cnt"
                                           value="{{ $room->kid_cnt }}">
                                </div>

                                <div class="form-group">
                                    <label>Yatak Sayısı</label>
                                    <input type="text" class="form-control" name="info_s[yatak]"
                                           value="{{$room->info_s ? $room->info_s["yatak"] : ""}}">
                                </div>

                                <div class="form-group">
                                    <label>Metrekare</label>
                                    <input type="text" class="form-control" name="info_s[m2]"
                                           value="{{$room->info_s ? $room->info_s["m2"] : ""}}">
                                </div>

                                    @foreach (App\Models\Room::getBoardR(true) as $key => $value)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                   id="cbox-spec-{{ $key }}" value="{{ $key }}"
                                                   name="info_s[{{ $key }}]"
                                                   @if(in_array($key  ,$deneme) ) checked="checked" @endif
                                            >
                                            <label for="cbox-spec-{{ $key }}" class="custom-control-label">
                                                {{ $key }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
