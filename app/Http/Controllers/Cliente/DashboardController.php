<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\DomainModel;
use App\Models\PageModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalPages = PageModel::where('user_id', $user->id)->count();
        $totalDomains = DomainModel::where('user_id', $user->id)->count();
        $totalVisits = PageModel::where('user_id', $user->id)->sum('visits');
        $latestPages = PageModel::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();

        return view('cliente.dashboard', compact('totalPages', 'totalDomains', 'totalVisits', 'latestPages'));
    }
}
