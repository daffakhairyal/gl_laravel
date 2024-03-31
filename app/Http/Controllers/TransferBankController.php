<?php

namespace App\Http\Controllers;

use App\Models\TransferBank;
use App\Http\Requests\StoreTransferBankRequest;
use App\Http\Requests\UpdateTransferBankRequest;
use Illuminate\Routing\Controller;

class TransferBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("transfer-bank");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransferBankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransferBank $transferBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransferBank $transferBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransferBankRequest $request, TransferBank $transferBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransferBank $transferBank)
    {
        //
    }
}
