@extends('app')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="mb-3" align='right'>
                        <a href="{{route('trans.create')}}" class="btn btn-primary">+</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Order Code</th>
                                    <th>Customer</th>
                                    <th>Order Finish</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{$key += 1}}</td>
                                <td>
                                    @if ($data->order_status == 0)
                                        <a href="{{route('trans.show', $data->id)}}">{{$data->order_code}}</a>
                                    @else
                                        {{$data->order_code}}
                                    @endif
                                </td>
                                <td>{{$data->customer->name ?? 'None'}}</td>
                                <td>{{$data->order_end_date}}</td>
                                <td>{{$data->status_text}}</td>
                                <td>
                                    <a href="{{route('print_struk', $data->id)}}" class="btn btn-info">Print</a>
                                    <a href="{{route('trans_detail', $data->id)}}" class="btn btn-success">Tampilkan</a>
                                    <form action="{{route('trans.destroy', $data->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2" type="submit" onclick="return confirm('yakin mau hapus?')">Delete </button>
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
