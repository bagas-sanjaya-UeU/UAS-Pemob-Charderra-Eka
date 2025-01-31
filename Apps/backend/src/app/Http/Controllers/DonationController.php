<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        // donations where user_id is the authenticated user and with user relationship and post relationship
        $donations = Donation::where('user_id', auth()->user()->id)->with('user', 'post')->latest()->paginate(10);
        return view('dashboard.donations.index', compact('donations'));
    }
    
    public function create()
    {
        return view('dashboard.donations.create');
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'post_id' => 'required',
                'name' => 'required',
                'amount' => 'required',
                
                
            ]);
    
            $payment_id = 'donation-' . time();
            
            Donation::create([
                'name' => $request->name,
                'amount' => $request->amount,
                'message' => $request->message,
                'user_id' => $request->user_id,
                'post_id' => $request->post_id,
                'payment_method' => 'transfer',
                'payment_id' => $payment_id,
                'status' => 'success',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Donation created successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

        
    }
    
    public function show($id)
    {
        $donation = Donation::find($id);
        return view('dashboard.donations.show', compact('donation'));
    }
    
    public function edit($id)
    {
        $donation = Donation::find($id);
        return view('dashboard.donations.edit', compact('donation'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'message' => 'required',
        ]);
        
        $donation = Donation::find($id);
        $donation->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'message' => $request->message,
        ]);

        return redirect()->route('dashboard.donations.index');
    }
    
    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return redirect()->route('dashboard.donations.index');
    }
}
