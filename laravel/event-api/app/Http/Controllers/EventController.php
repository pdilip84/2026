<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // protecting some methods using sanctum middleware
        $this->middleware('auth:sanctum')->only(['store', 'update', 'destroy']);

        //apply policy to the resource controller
        // $this->authorizeResource(Event::class, 'event');
    }

    public function index()
    {
        return EventResource::collection(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'description' => 'nullable|string',
        ]);

        $user = $request->user();
        if (! $user) {
            abort(401, 'Unauthenticated.');
        }

        $event = Event::create(array_merge($data, ['organizer_id' => $user->id]));
        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return new EventResource($event);
        // return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after:start_time',
            'description' => 'nullable|string',
        ]);

        $event->update($data);
        return response()->json(['message' => 'Event updated successfully', 'event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully']);
    }
}
