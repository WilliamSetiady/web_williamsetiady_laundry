@extends('app')
@section('main')
<div class="row"></div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- $title disini dipanggil dari compact yang sebelumnya ada didalam controller Level --}}
                <h3 class="card-title"> {{$title}} </h3>
                <div class="mb-3" align="right">
                    {{-- route disini untuk mengambil fungsi dari LevelController --}}
                    <a href="{{route('level.create')}}" class="btn btn-primary">+</a>
                </div>
                <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{$key += 1 }}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                    <a href="{{route('level.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('level.destroy', $data->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
