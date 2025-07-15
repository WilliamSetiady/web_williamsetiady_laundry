@extends('app')
@section('main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">
                {{-- {route('level.update', $level->id)}} berfungsi untuk mengambil fungsi yang sudah ada pada levelController di function update --}}
                <form action="{{route('level.update', $levels->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">level Name</label>
                        <input value="{{$levels->name}}" type="text" placeholder="Masukkan Nama level" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
