@extends('app')
@section('main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">
                {{-- {route('customer.update', $customer->id)}} berfungsi untuk mengambil fungsi yang sudah ada pada customerController di function update --}}
                <form action="{{route('customer.update', $customers->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Customer Name</label>
                        <input value="{{$customers->name}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Customer Name</label>
                        <input value="{{$customers->phone}}" type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Customer Name</label>
                        <input value="{{$customers->address}}" type="text" class="form-control" name="name" required>
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
