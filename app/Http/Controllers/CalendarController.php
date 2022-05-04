<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Http\Requests\StoreCalendarRequest;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Timetable;
use App\Models\Hour;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {
            return view('fragments/homepage');
        }



        $user = Auth::id();

        $categoriesTimetable = auth()->user()->timetables()->with('hours')->with('categories')->get();

        $user = Auth::id();

        $days = Timetable::select('*')
            ->where('user_id', '=', $user)
            ->get();

        $categories = Category::select('*')
            ->where('user_id', '=', $user)
            ->get();

        $events = Event::select('*')
            ->where('user_id', '=', $user)
            ->get();

        return view('/fragments/calendar', compact('categories', 'events', 'user', 'categoriesTimetable', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('calendar.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCalendarRequest $request)
    {
        $request->validated();

        if ($request->has('eventTitle')) {

            $data = $request->all();

            if ($data['color'] == Null) {
                $data['color'] = "#e609e2";
            }
            // writes the validated data to the DB
            Event::create($data);
        }
        elseif ($request->has('categoryName')) {

            // writes the validated data to the DB
            // Category::create($request->all());
            $category_c = $request->categoryColor;


            // return $category_c;


            $category_a = Category::create($request->all())->categoryName;

            // $category_id = $request->id;

            //add to timetable somehow

            $h1 = $request->categoryStartTime; //start time

            $h2 = $request->categoryEndTime; //end time

            $id = $request->timetable_id; //specific day id



            for ($i = $h1; $i <= $h2; $i++) {
                Hour::select('*')
                    ->where('timetable_id', '=', $id)->where('hour_number', '=', $i)->update(['slot' => $category_a, 'color' => $category_c]);
            }

        // Hour::select('*')
        //     ->where('timetable_id', '=', $id)->where('hour_number', '=', $h1)->where('hour_number', '=', $h2)->update(['slot' => 'X']);

        // Hour::select('*')
        //     ->where('timetable_id', '=', $id)->where('hour_number', '=', $h2)->update(['slot' => 'X']);





        }

        return redirect()->route('calendar.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Category $Category)
    {
        $event = Event::all();
        $category = Category::all();

        return view('/fragments/calendar', compact($event, $category));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, Category $Category)
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
    public function update(Request $request, Event $event, Category $Category)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Category $Category)
    {
    //
    }
}
