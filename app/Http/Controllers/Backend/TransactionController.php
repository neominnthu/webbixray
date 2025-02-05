<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use Auth;

class TransactionController extends Controller
{

    // Display all transactions with filtering and search
    public function index(Request $request) {

        $query = WalletTransaction::query();

        // Filter by date range
        if ($request->has('filter')) {
            $filter = $request->input('filter');
            if ($filter == 'daily') {
                $query->whereDate('date', Carbon::today());
            } elseif ($filter == 'weekly') {
                $query->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($filter == 'monthly') {
                $query->whereMonth('date', Carbon::now()->month);
            }
        }

        // Search by description or category
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('description', 'LIKE', "%$search%")
                  ->orWhere('type', 'LIKE', "%$search%");
            });
        }

        // Sorting (default by date)
        $sortBy = $request->input('sort_by', 'date');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $transactions = $query->paginate(10);

        return view('backend.transactions.index', compact('transactions'));
    }

    public function myTransaction(Request $request)

    {
        $transactions = WalletTransaction::where('wallet_id', Auth::user()->wallet->id)->latest()->paginate(10);
        return view('backend.transactions.mytransaction', compact('transactions'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

}
