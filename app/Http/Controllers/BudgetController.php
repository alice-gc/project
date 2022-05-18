<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Requests\StoreBudgetRequest;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\BudgetResource;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  TODO -> id instead of user,
    // TODO -> delete invisible input id
    public function index()
    {
        if (!Auth::check()) {
            return view('fragments/homepage');
        }


        if (auth()->user() != Null) {
            $user = Auth::user();

            $budget = Auth::user()->budgets;

            return view('/fragments/budget', compact('budget', 'user'));
        }
        else {
            $user = Null;
            $budget = Null;
            return view('/fragments/budget', compact('budget', 'user'));
        }


    }

    public function index_old()
    {
        if (!Auth::check()) {
            return view('fragments/homepage');
        }


        if (auth()->user() != Null) {
            $user = Auth::id();

            $budget = Auth::user()->budgets;

            return view('/fragments/original-budget', compact('budget', 'user'));
        }
        else {
            $user = Null;
            $budget = Null;
            return view('/fragments/original-budget', compact('budget', 'user'));
        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('budget.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetRequest $request)
    {


        // $user_id = Auth::user()->id();
        $request->validated();

        Budget::updateOrCreate([
            'name' => request('name')
        ], [
            'house' => request('house'),
            'food' => request('food'),
            'transport' => request('transport'),
            'personal' => request('personal'),
            'entertainment' => request('entertainment'),
            'user_id' => request('user_id'),
        ]);

        //print all stuff from database
        // return redirect()->route('budget.index');
        return response()->json(['success' => 'Budget has been successfully added'], 200);
    }

    public function store2(StoreBudgetRequest $request)
    {


        // $user_id = Auth::user()->id();
        $request->validated();

        Budget::updateOrCreate([
            'name' => request('name')
        ], [
            'house' => request('house'),
            'income' => request('income'),
            'food' => request('food'),
            'transport' => request('transport'),
            'personal' => request('personal'),
            'entertainment' => request('entertainment'),
            'user_id' => request('user_id'),
        ]);

        //print all stuff from database
        // return redirect()->route('budget.index');
        return redirect()->route('budget-old.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        $budget = Budget::all();

        return view('/fragments/budget', compact($budget));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Budget::find($id)->delete();

        return redirect()->route('budget.index');

    }

    public function getBudgets()
    {
        return BudgetResource::collection(Auth::user()->budgets);
    }
}
