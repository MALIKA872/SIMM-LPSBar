<?php

namespace App\Http\Controllers;
use App\Models\Portfolio;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() {
        $portfolioData = Portfolio::all();  // Mengambil semua data

        return view('portfolio', compact('portfolioData'));


    }
}
