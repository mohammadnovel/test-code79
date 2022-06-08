<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Transaction;
use App\Models\Account;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Transaction::query()
        ->with('account')
        ->orderBy('id', 'desc')->paginate(5);
        // dd($data['transactions']);
        return view('transaction.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        return view('transaction.create', compact('accounts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'amount' => 'required',
        ]);
        // dd($request);

        $transaction = new Transaction();
        $transaction->account_id = $request->account_id;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->description = $request->description;
        $transaction->status = $request->status;
        $transaction->amount = $request->amount;
        $transaction->save();
        return redirect()
            ->route('transaction.index')
            ->with('success', 'transaction has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $accounts = Account::all();
        return view('transaction.edit', compact('transaction', 'accounts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate(['name' => 'required', ]);
        $transaction = Transaction::find($id);
        $transaction->account_id = $request->account_id;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->description = $request->description;
        $transaction->status = $request->status;
        $transaction->amount = $request->amount;
        $transaction->save();
        return redirect()
            ->route('transaction.index')
            ->with('success', 'transaction Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        $transaction->delete();
        return redirect()
            ->route('transaction.index')
            ->with('success', 'transaction has been deleted successfully');
    }
}
