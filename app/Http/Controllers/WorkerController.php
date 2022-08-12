<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Position;
use Illuminate\Http\Request;
use DB;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $workers = Worker::all();
        $workers = DB::table("workers")
        ->join("positions", "position_id", "=", "positions.id")
        ->select("workers.id", "workers.surname", "workers.name", "workers.patronymic", 'positions.post')
        // ->paginate(10)
        ->get();

        return view('workers.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $positions = Position::all();
        $positions = DB::select('select * from positions');

        return view('workers.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Worker::create($request->all());

        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('workers.edit',compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $worker->update($request->all());

        return redirect()->route('workers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Worker $worker)
    {
        $worker->delete($request->all());

        return redirect()->route('workers.index');
    }
}
