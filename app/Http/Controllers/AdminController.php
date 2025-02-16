<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){

        return view('index');
    }

    public function searchNoHp(Request $request){
        $nomorHp = $request->no_hp;
        $datas = DataPesanan::where('no_hp','like','%'.$nomorHp.'%')->get();
        return view('index',compact('datas'));
    }

    public function index()
    {
        $datas = DataPesanan::orderBy('created_at', 'desc')->get();


        return view('admin', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hargaPerkilo = 10000;
        $totalHarga = $hargaPerkilo * $request->total_berat;

        $data = DataPesanan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'total_berat' => $request->total_berat,
            'total_harga' => $totalHarga,
            'status' => 'Belum Selesai'
        ]);

        return redirect()->route('admin');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataPesanan::find($id);

        return view('adminUpdate', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hargaPerkilo = 10000;
        $totalHarga = $hargaPerkilo * $request->total_berat;

        $data = DataPesanan::find($id);

        $data->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'total_berat' => $request->total_berat,
            'total_harga' => $totalHarga,
            'status' => $request->status
        ]);

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataPesanan::find($id);

        $data->delete();

        return redirect()->route('admin');
    }

    public function owner(){
        $datas = DataPesanan::orderBy('created_at', 'desc')->get();
        return view('owner',compact('datas'));
    }

    public function searchDate(Request $request){
        $date = $request->date;
        $resultDate = DataPesanan::where('created_at','like','%'.$date.'%')->get();
        
        return view('owner',compact('resultDate'));
    }
}
