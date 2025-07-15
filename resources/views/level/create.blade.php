@extends('app')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    {{-- {{route('level.store')}} berfungsi untuk mengambil fungsi yang sudah ada pada levelController di function store --}}
                    <form action="{{route('level.store')}}" method="POST">
                        @csrf
                        <label class="form-label" for="">Name</label>
                        <input type="text" class="form-control mb-3" name="name" placeholder="Name..." required>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
