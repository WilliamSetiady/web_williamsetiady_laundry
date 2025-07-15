@extends('app')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    {{-- {{route('customer.store')}} berfungsi untuk mengambil fungsi yang sudah ada pada customerController di function store --}}
                    <form action="{{route('customer.store')}}" method="POST">
                        @csrf
                        <label class="form-label" for="">Name</label>
                        <input type="text" class="form-control mb-3" name="name" placeholder="Name..." required>
                        <label class="form-label" for="">Phone</label>
                        <input type="text" class="form-control mb-3" name="phone" placeholder="Phone..." required>
                        <label class="form-label" for="">Address</label>
                        <input type="text" class="form-control mb-3" name="address" placeholder="Address..." required>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
