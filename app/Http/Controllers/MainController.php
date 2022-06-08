<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function point()
    {
        $datas = DB::select('select ac.id,ac.name, 
        SUM(CASE WHEN ts.description = "Bayar Pulsa" AND ts.amount > 0 AND ts.amount <= 10000 THEN (ts.amount div 1000 * 0) ELSE 0 END) + 
        SUM(CASE WHEN ts.description = "Bayar Pulsa" AND ts.amount > 10000 AND ts.amount <= 30000 THEN (ts.amount div 1000 * 1) ELSE 0 END) + 
        SUM(CASE WHEN ts.description = "Bayar Pulsa" AND ts.amount > 30000 THEN (ts.amount div 1000 * 2) ELSE 0 END) +
        SUM(CASE WHEN ts.description = "Bayar Listrik" AND ts.amount > 0 AND ts.amount <= 50000 THEN (ts.amount div 2000 * 0) ELSE 0 END) +
        SUM(CASE WHEN ts.description = "Bayar Listrik" AND ts.amount > 50000 AND ts.amount <= 100000 THEN (ts.amount div 2000 * 1) ELSE 0 END) +
        SUM(CASE WHEN ts.description = "Bayar Listrik" AND ts.amount > 100000 THEN (ts.amount div 1000 * 2) ELSE 0 END) AS point
        FROM transactions ts INNER JOIN accounts ac ON ts.account_id  = ac.id  
        GROUP BY ac.id, ac.name');
        return view('point', compact(
            'datas'
        ));
    }

    public function report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id = $request->account_id;
        $account = Account::whereId($id)->first();
        $datas = DB::table('transactions')
        ->select(DB::raw(
            'transaction_date, description, 
            CASE 
             WHEN status = "C" THEN amount
             ELSE "-"
            END AS credit,
            CASE 
             WHEN status = "D" THEN amount
             ELSE "-"
            END AS debit,
            amount'
        ))
        // ->leftJoin('accounts AS ac', 'transactions.account_id', '=', 'ac.id')
        ->where('account_id', $id);
        if ($start_date && $end_date) {
            $datas = $datas->whereDate('transaction_date', '>=',$start_date)
            ->whereDate('transaction_date', '<=', $end_date);
        }
        $datas = $datas->get();

        return view('report', compact('datas','account'));
    }

    public function index()
    {
        $accounts = Account::all();
        return view('welcome', compact('accounts'));
    }


}
