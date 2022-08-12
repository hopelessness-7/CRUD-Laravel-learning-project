<?php

namespace App\Http\Controllers;
    
use App\Models\Recording;
use Illuminate\Http\Request;
use DB;
// use Illuminate\Pagination\Paginator;

class RecordingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordings = DB::table("recordings")
        ->join("workers", "worker_id", "=", "workers.id")
        ->join("cabinets", "cabinet_id", "=", "cabinets.id")
        ->select("recordings.id", "workers.surname", "workers.name", "workers.patronymic" ,'cabinets.cabinet_number', 'recordings.arrival_date', 'recordings.departure_date')
        // ->paginate(10)
        ->get();
        return view('resordings.index',compact('recordings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = DB::select('select * from workers');
        $cabinets = DB::select('select * from cabinets');
        return view('resordings.create',compact('workers','cabinets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Recording::create($request->all());

        return redirect()->route('recordings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function show(Recording $recording)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function edit(Recording $recording)
    {
        return view('resordings.edit',compact('recording'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recording $recording)
    {
        $recording->update($request->all());

        return redirect()->route('recordings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recording $recording)
    {
        //
    }
}
