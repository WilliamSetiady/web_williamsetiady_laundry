@extends('app')
@section('main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">
                {{-- {route('user.update', $user->id)}} berfungsi untuk mengambil fungsi yang sudah ada pada UserController di function update --}}
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">UserName</label>
                        <input value="{{$user->name}}" type="text" placeholder="Masukkan Nama User" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Level</label>
                        <select class="form-control" name="id_level" id="">
                            <option value="">Choose One...</option>
                            @foreach ($levels as $level)
                                <option {{$level->id == $user->id_level ? 'selected' : ''}} value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input value="{{$user->email}}" type="email" placeholder="Masukkan Email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" placeholder="Masukkan Password" class="form-control" name="password">
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