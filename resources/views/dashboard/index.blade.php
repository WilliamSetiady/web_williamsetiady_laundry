@extends('app')
@section('main')
<section class="section">
    </section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
                        <p class="card-text">You are logged in as {{ Auth::user()->level->name }}.</p>
                        <p class="card-text">Current date and time: {{ now()->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <form action="{{ route('dashboard.index') }}">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

@endsection
