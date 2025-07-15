@extends('app')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="mb-3" align='right'>
                        <a href="{{route('service.create')}}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Servis</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{$key += 1}}</td>
                                <td>{{$data->service_name}}</td>
                                <td>{{number_format($data->price)}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <a href="{{route('service.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('service.destroy', $data->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="btn btn-danger m-2" type="submit" onclick="return confirm('yakin mau hapus?')">Delete </a>
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
