<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BudgetController;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function index()
    {
        return view("/layouts/main");
    }
    public function homepage()
    {


        return view("/fragments/homepage");
    }

    public function guest_index()
    {
        return view("/fragments/homepage");
    }

    public function budget_old()
    {
        return view("/fragments/original-budget");
    }
}
