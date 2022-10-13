<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Order;
use App\Models\Image;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ImportData;
use App\Exports\ExportData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request){
            $order = Order::where('order_id', 'like', '%'.$request->search.'%')->get();
        } else {
            
            $order = Order::sortable()->get();
        }
        
        return view('order.index', compact('order'));
    }
    
    // public function cari(Request $request)
    // {
    //     //$order = Order::with('images')->get();

    //     $order = Order::where('username', 'like', '%'.$request->search.'%')->get();

    //     //return view('order.index', compact('order'));
    //     return Redirect::to('/order');
    // }

    // public function index()
    // {
    //     $order = Order::sortable()->get();
        
    //     return view('order.index', compact('order'));
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new ImportData(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('order.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('order.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function importView(Request $request){
        return view('importFile');
    }

    public function updateStatusChecking(Order $order)
    {
        Order::updateStatusChecking($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusCheckingPending(Order $order)
    {
        Order::updateStatusCheckingPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusConfirm(Order $order)
    {
        Order::updateStatusConfirm($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusConfirmPending(Order $order)
    {
        Order::updateStatusConfirmPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusSent(Order $order)
    {
        Order::updateStatusSent($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusSentPending(Order $order)
    {
        Order::updateStatusSentPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPaid(Order $order)
    {
        Order::updateStatusPaid($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPaidPending(Order $order)
    {
        Order::updateStatusPaidPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPod(Order $order)
    {
        Order::updateStatusPod($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPodPending(Order $order)
    {
        Order::updateStatusPodPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusDel(Order $order)
    {
        Order::updateStatusDel($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusDelUndelivery(Order $order)
    {
        Order::updateStatusDelUndelivery($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusTransaction(Order $order)
    {
        Order::updateStatusTransaction($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusTransactionUnfinished(Order $order)
    {
        Order::updateStatusTransactionUnfinished($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusReceived(Order $order)
    {
        Order::updateStatusReceived($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusReceivedPending(Order $order)
    {
        Order::updateStatusReceivedPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
    }

    public function indexImage()
    {
        $image = Image::all();
        $order = Order::all();
        return view('order.inputimage', compact('image', 'order'));
    }

    public function storeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'image' => 'required',
        ]);
            
        $image = new Image;
        $image->image = $request->file('image')->store('images', 'public');

        $order = new Order;
        $order->id = $request->get('order_id');

        $image->order()->associate($order);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $image->save();

        Alert::toast('Data baru berhasil dibuat.', 'success');
        return redirect()->route('order.index');
    }

    public function showImage(Order $order)
    {
        $image = Image::getImageByOrder($order->id);
        //dd($image);
        return view('order.showimage', compact('order', 'image'));
    }

    /*public function import(Request $request){
        Excel::import(new ImportData, $request->file('file')->store('files'));
        return redirect()->back();
    }*/

    public function export(Request $request){
        return Excel::download(new ExportData, 'orders.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

            $order->update([
                'order_date'        => $request->order_date,
                'username'          => $request->username,
                'order_id'          => $request->order_id,
                'customer_address'  => $request->customer_address,
                'customer_phone'    => $request->customer_phone,
                'user_kelurahan'    => $request->user_kelurahan,
                'user_kecamatan'    => $request->user_kecamatan,
                'cod_ammount'       => $request->cod_ammount,
                'keterangan'        => $request->keterangan,
            ]);

        

        /*$order->update([
            'order_date'        => $request->order_date,
            'username'          => $request->username,
            'order_id'          => $request->order_id,
            'customer_address'  => $request->customer_address,
            'customer_phone'    => $request->customer_phone,
            'user_kelurahan'    => $request->user_kelurahan,
            'user_kecamatan'    => $request->user_kecamatan,
            'cod_ammount'       => $request->cod_ammount,
            'keterangan'        => $request->keterangan,
        ]);*/

        Alert::toast('Data berhasil diedit.', 'success');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Image::where("order_id", $id)->delete();
        // Order::where("id", $id)->delete();

        Image::destroyByOrder($order->id);
        $order->delete();

        Alert::toast('Data berhasil dihapus.', 'success');
        return redirect()->route('order.index');
    }

    // public function multipleDestroyOrder(Request $request)
	// {   
    //     $ids = $request->ids;

    //     $order = Order::whereIn('id', [$request->id]);

    //     Order::whereIn('id', $ids)->delete();
    //     return redirect()->route('order.index');
	// }
    
}
