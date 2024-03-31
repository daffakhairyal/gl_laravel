<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage', 10); // Default to 10 items per page
        $accounts = Account::orderBy('id', 'asc')->paginate($perPage);
        return view('account', compact('accounts'));
    }

    public function create()
    {
        return view('modal.add-data-coa');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'account' => 'required',
            'type' => 'required',
            'klasifikasi' => 'required',
            'defSaldo' => 'required',
            'level' => 'required',
            'induk' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan menyimpan data
        $account = new Account;

        $account->name = $request->name;
        $account->account = $request->account;
        $account->induk = $request->induk;
        $account->level = $request->level;
        $account->defSaldo = $request->defSaldo;
        $account->klasifikasi = $request->klasifikasi;
        $account->type = $request->type;

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Account has been created successfully.');
    }

    public function edit(Account $account)
    {
        return view('modal.edit-data-coa', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'account' => 'required',
            'type' => 'required',
            'klasifikasi' => 'required',
            'defSaldo' => 'required',
            'level' => 'required',
            'induk' => 'nullable',
        ]);

        $account = Account::find($id);

        $account->name = $request->name;
        $account->account = $request->account;
        $account->induk = $request->induk;
        $account->level = $request->level;
        $account->defSaldo = $request->defSaldo;
        $account->klasifikasi = $request->klasifikasi;
        $account->type = $request->type;

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Account Has Been updated successfully');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account has been deleted successfully');
    }

    public function search(Request $request)
{
    $query = $request->get('query');
    $accounts = Account::where('name', 'like', "%$query%")->pluck('name');
    return response()->json($accounts);
}

}
