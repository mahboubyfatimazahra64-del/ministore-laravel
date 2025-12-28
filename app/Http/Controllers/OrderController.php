<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client', 'products'])->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        // Hna fin kiban l'mouchkil: ila l'base de données khawya, l'lista ghat'bqa khawya
        $products = Product::where('quantity', '>', 0)->get();
        return view('orders.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity < $request->quantity) {
            return back()->with('error', 'Stock insuffisant!');
        }

        $order = Order::create([
            'client_id' => $request->client_id,
            'total_price' => $product->price * $request->quantity
        ]);

        $order->products()->attach($product->id, [
            'quantity' => $request->quantity,
            'price' => $product->price
        ]);

        $product->decrement('quantity', $request->quantity);

        return redirect()->route('orders.index')->with('success', 'Vente réussie!');
    }

    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {
            $product->increment('quantity', $product->pivot->quantity);
        }

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Vente annulée!');
    } 
public function edit(Order $order)
{
    $clients = Client::all();
    $products = Product::all();
    
    // Khassna l'order y'koun fih l'produits dyalu bach n'jbdo quantity
    $order->load('products');
    
    return view('orders.edit', compact('order', 'clients', 'products'));
}
} // Sddina l'Class hna