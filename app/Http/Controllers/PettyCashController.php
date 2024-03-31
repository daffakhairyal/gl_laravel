<?php

namespace App\Http\Controllers;

use App\Models\PettyCash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class PettyCashController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage', 10); // Default to 10 items per page
        $pettyCashList = PettyCash::orderBy('id', 'asc')->paginate($perPage);
        return view('petty-cash', compact('pettyCashList'));
    }

    public function create()
    {
        return view('petty_cash.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'detail' => 'required',
            'noVoucher' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required|date',
            'divisi' => 'required',
            'karyawan' => 'required',
            'deskripsi' => 'required',
            'debit' => 'required|integer',
            'credit' => 'required|integer',
            'createdBy' => 'required',
            // Add more validation rules as needed
        ]);
    
        if ($validator->fails()) {
            // Jika validasi gagal, langsung tampilkan dd()
            dd('Validasi gagal:', $validator->errors()->all());
        }
    
        // Jika validasi berhasil, lanjutkan menyimpan data
        $pettyCash = new PettyCash;
    
        $pettyCash->account = $request->account;
        $pettyCash->detail = $request->detail;
        $pettyCash->noVoucher = $request->noVoucher;
        $pettyCash->jenis = $request->jenis;
        $pettyCash->tanggal = $request->tanggal;
        $pettyCash->divisi = $request->divisi;
        $pettyCash->karyawan = $request->karyawan;
        $pettyCash->deskripsi = $request->deskripsi;
        $pettyCash->debit = $request->debit;
        $pettyCash->credit = $request->credit;
        $pettyCash->createdBy = $request->createdBy;
        $pettyCash->status = 0; // Menetapkan nilai default 0 untuk status
    
        $pettyCash->save();
        return redirect('/petty-cash');
    
        // Redirect ke halaman yang sesuai
    }
    
    

    public function edit(PettyCash $pettyCash)
    {
        return view('petty_cash.edit', compact('pettyCash'));
    }

    public function update(Request $request, PettyCash $pettyCash)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'noVoucher' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required|date',
            'divisi' => 'required',
            'karyawan' => 'required',
            'deskripsi' => 'required',
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
            'createdBy' => 'required',
            // Add more validation rules as needed
        ]);

        $pettyCash->update($request->all());

        return redirect()->route('pettyCash.index')->with('success', 'Petty Cash entry has been updated successfully.');
    }

    public function destroy(PettyCash $pettyCash)
    {
        $pettyCash->delete();

        return redirect()->route('pettyCash.index')->with('success', 'Petty Cash entry has been deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
{
    $pettyCash = PettyCash::findOrFail($id);
    
    // Validasi status
    $request->validate([
        'status' => 'required|in:0,1',
    ]);

    // Update status
    $pettyCash->status = $request->status;
    $pettyCash->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}

    
}
