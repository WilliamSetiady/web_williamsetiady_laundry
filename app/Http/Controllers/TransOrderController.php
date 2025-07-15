<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\TransDetails;
use App\Models\TransOrders;
use App\Models\TypeOfServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Midtrans\Config;
use Midtrans\Snap;

class TransOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TransOrders::with('customer')->orderBy('id', 'desc')->get();
        // $datas = TransOrders::all();
        $title = 'Transaction';
        return view('trans.index',  compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TR-01072025-001
        $title = 'Add Transaction';

        // $today = date('dmY');
        $today = Carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() + 1;
        $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
        $orderCode = "TR-" . $today . "-" . $runningNumber;

        $customers = Customers::orderBy('id', 'desc')->get();
        $services = TypeOfServices::orderBy('id', 'desc')->get();
        return view('trans.laundry', compact('title', 'orderCode', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $transOrder = TransOrders::create([
            'id_customer' => $request->id_customer,
            'order_code' => $request->order_code ?? 'TRX-' . time(),
            'order_end_date' => $request->order_end_date ?? now()->addDays(2),
            'total' => $request->total,
            'note' => $request->note ?? ''
        ]);


        foreach ($request->items as $item) {
            TransDetails::create([
                'id_trans' => $transOrder->id,
                'id_service' => $item['id_service'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal']
            ]);
        }
    }
    // TransOrders::create($request->all());

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $title = "Transaction Detail";
        $details = TransOrders::with('customer', 'details.service')->where('id', $id)->first();

        return view('trans.show', compact('title', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trans = TransOrders::findOrFail($id);
        $trans->delete();

        return redirect()->to('trans')->with('success', 'Hapus Berhasil');
    }

    public function printStruk(string $id)
    {
        $details = TransOrders::with('customer', 'details.service')->where('id', $id)->first();
        // $services = TransDetails::with('services')->where('id_service', $id)->get();
        // dd($details);
        // return ($details);
        return view('trans.print_struk', compact('details'));
    }
    public function transStore(Request $request)
    {
        return $request;
    }
}
