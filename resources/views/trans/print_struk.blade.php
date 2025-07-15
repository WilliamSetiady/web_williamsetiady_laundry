<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Struk</title>
        <link href="css/style.css" rel="stylesheet">
        <style>
            body {
                font-family:'Courier New';
                width: 80mm;
                margin: auto;
                padding: 10px;
            }
            .struk {
                text-align: center;
            }
            .line {
                margin: 5px 0;
                border-top: 1px dashed black;
            }
            .info, .product, .summary {
                text-align: left;
            }
            .product .item {
                margin-bottom: 5px;
            
            }
            .product .item-qty {
                display: flex;
                justify-content: space-between;
            }

            .info .row,
            .summary .row {
                display: flex;
                justify-content: space-between;
                margin: 2px 0;
            }

            footer {
                text-align: center;
                font-size: 13px;
                margin-top: 10px;
            }

            @media print {
                body {
                    width: 80mm;
                    margin: 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="struk">
            <div class="struk-header">
                <h3>Laundry</h3>
                <h2>Murah Meriah</h2>


                <div class="info text-center">
                    Jl. Karet Baru Benhill Jakarta Pusat
                    <br>
                    08128930238
                </div>
            </div>
            <div class="line"></div>
            <div class="info">
                <div class="row">
                    <span> {{$details->created_at->format('d M Y')}} </span>
                    <span> {{$details->created_at->format('H:i')}} </span>
                </div>
                <div class="row">
                    <span>Cashier</span>
                    <span>{{auth()->user()->name}}</span>
                </div>
            </div>
            <div class="row">
                <span>Order Id: </span>
                <span> {{$details->order_code ?? ''}} </span>
            </div>

            <div class="line"></div>
    <div class="product">
        @foreach ($details->details as $detail)    
        <div class="item">
            <strong> {{$detail->service->service_name}} </strong>
            <div class="item-qty">
                <span> {{$detail->qty}} @ {{number_format($detail->service->price)}}</span>
                <span>{{$detail->subtotal}}</span>
            </div>
        </div>
        @endforeach
    </div>
    <div class="line"></div>
    <div class="summary">
        <div class="row">
            <span>Subtotal</span>
            <span>Rp. {{number_format($details->total)}}</span>
        </div>
    </div>
    <div class="line"></div>
    <div class="footer" class="text-center">
        Terima Kasih!!
    </div>
        </div>


    
        <div class="receipt">
                    <div class="receipt-header">
                        <h2>🧺 LAUNDRY RECEIPT</h2>
                        <p>ID: ${transaction.id}</p>
                        <p>Tanggal: ${new Date(transaction.date).toLocaleString('id-ID')}</p>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <strong>Pelanggan:</strong><br>
                       {{$details->customer->name}}<br>
                        {{$details->customer->phone}}<br>
                        {{$details->customer->address}}
                    </div>

                    <div style="margin-bottom: 20px;">
                        <strong>Detail Pesanan:</strong><br>
                        
                            <div class="receipt-item">
                                @foreach ($details->details as $detail)
                                <span>{{$detail->service->service_name}} {{$detail->qty}} : 'kg'})</span>
                                <span>Rp {{number_format($detail->subtotal)}}</span>
                                @endforeach
                            </div>

                    </div>

                    <div class="receipt-total">
                        <div class="receipt-item">
                            <span>TOTAL:</span>
                            <span>Rp {{$details->total}}</span>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 20px;">
                        <p>Terima kasih atas kepercayaan Anda!</p>
                        <p>Barang akan siap dalam 1-2 hari kerja</p>
                    </div>
                </div>

    <script>
        window.print();
    </script>
    </body>
</html>