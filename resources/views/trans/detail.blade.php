@extends('app')
@section('main')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Data Pelanggan </h3>
                <table class="table table-stripped">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td> {{$details->customer->name}} </td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td> {{$details->customer->phone}} </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td> {{$details->customer->address}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Transaksi Pemesanan </h3>
                <table class="table table-stripped">
                    <tr>
                        <td>No.Transaksi</td>
                        <td>:</td>
                        <td> {{$details->order_code}} </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengambilan</td>
                        <td>:</td>
                        <td> {{date('d F Y', strtotime($details->order_end_date))}} </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td> {{$details->status_text}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection