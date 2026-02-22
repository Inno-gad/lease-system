<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Payment;

class DashboardController extends Controller
{
   public function index()
    {
        $totalProperties = Property::count();
        $totalTenants = Tenant::count();
        $activeLeases = Lease::where('status', 'active')->count();
        $totalPayments = Payment::sum('amount_paid');

        // Added this line to fetch the 5 newest leases with their linked tenant and property data
        $recentLeases = Lease::with(['tenant', 'property'])->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProperties',
            'totalTenants',
            'activeLeases',
            'totalPayments',
            'recentLeases' // Make sure this is added to the compact array!
        ));
    }
}