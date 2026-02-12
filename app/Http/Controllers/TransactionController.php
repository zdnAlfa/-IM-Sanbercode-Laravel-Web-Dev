<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product', 'user')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all(); 
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id); 

        
        if ($request->type === 'out' && $product->stock < $request->amount) {
            return back()->withErrors([
                'amount' => 'Stock tidak cukup! Tidak bisa melakukan transaksi keluar.'
            ]);
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);

        
        if ($request->type === 'in') {
            $product->stock += $request->amount;
        } else {
            $product->stock -= $request->amount;
        }

        $product->save(); // ✅ Simpan perubahan stock

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }
}