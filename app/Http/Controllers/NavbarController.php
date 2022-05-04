<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Event;
use App\Models\Category;

class NavbarController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tasks()
    {
        return view('/fragments/tasks');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function budget(){

        $budget = Budget::all();

     return view('/fragments/myBudget',['budget'=>$budget]);
    }

}