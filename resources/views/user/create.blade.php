@extends('app')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    {{-- {{route('user.store')}} berfungsi untuk mengambil fungsi yang sudah ada pada UserController di function store --}}
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <label class="form-label" for="">Name</label>
                        <input type="text" class="form-control mb-3" name="name" placeholder="Name..." required>
                        <label class="form-label" for="">Level</label>
                        <select class="form-control mb-3" name="id_level" id="">
                            <option value="">Choose One...</option>
                            @foreach ($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label" for="">Email</label>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Email..." required>
                        <label class="form-label" for="">Password</label>
                        <input type="password" name="password" id="" class="form-control mb-3" placeholder="Password..."></input>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
