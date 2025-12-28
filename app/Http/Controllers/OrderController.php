<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. Afficher l'historique
    public function index()
    {
        $orders = Order::with(['client', 'products'])->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // 2. Formulaire dial Nouvelle Vente
    public function create()
    {
        $clients = Client::all();
        $products = Product::where('quantity', '>', 0)->get();
        return view('orders.create', compact('clients', 'products'));
    }

    // 3. Enregistrer la vente + Mise à jour Stock
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

        // Création de la commande
        $order = Order::create([
            'client_id' => $request->client_id,
            'total_price' => $product->price * $request->quantity
        ]);

        // Attacher le produit et mettre à jour le pivot
        $order->products()->attach($product->id, [
            'quantity' => $request->quantity,
            'price' => $product->price
        ]);

        // Mise à jour du stock automatique
        $product->decrement('quantity', $request->quantity);

        return redirect()->route('orders.index')->with('success', 'Vente réussie et stock mis à jour !');
    }

    // 4. Modifier une vente
    public function edit(Order $order)
    {
        $clients = Client::all();
        $products = Product::all();
        $order->load('products');
        
        return view('orders.edit', compact('order', 'clients', 'products'));
    }

    // 5. Annuler la vente + Rendre les produits au Stock
    public function destroy(Order $order)
    {
        // Rendre les quantités au stock avant de supprimer
        foreach ($order->products as $product) {
            $product->increment('quantity', $product->pivot->quantity);
        }

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Vente annulée et stock restauré !');
    }
}