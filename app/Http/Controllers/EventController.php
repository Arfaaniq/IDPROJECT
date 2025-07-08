<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kalender');
    }

    public function listEvent(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Event::where('start_date', '>=', $start)
        ->where('end_date', '<=', $end)->get()
        ->map( fn ($item) => [
            'id' => $item->id,
            'title' => $item->title,
            'start' => $item->start_date,
            'end' => date('Y-m-d',Strtotime($item->end_date. '+1 days')),
            'category' => $item->category,
            'className' => ['bg-'. $item->category]
        ]);

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('admin.event-form', ['data' => $event, 'action' => route('events.store')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request, Event $event)
    {
        return $this->update($request, $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event-form', ['data' => $event, 'action' => route('events.update', $event->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        if ($request->has('delete')) {
            return $this->destroy($event);
        }
        // ini function store dari function create, dan disini untuk handle radio, pada event-form success-danger-warning
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->title = $request->title;
        $event->category = $request->category;

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Dihapus!'
        ]);
    }
    // tambahan list event baru
    public function listAllEvents()
    {
        $events = Event::select('id', 'title', 'start_date as start', 'end_date as end', 'category')->get();
        return response()->json($events);
    }
}