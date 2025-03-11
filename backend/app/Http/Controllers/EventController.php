<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //
    public function getEvent()
    {
        $event = EventModel::all();
        if ($event->count() > 0) {
            return response()->json([
                'status' => 200,
                'event' => $event
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'event' => 'No Records Found'
            ]);
        }
    }

    public function listEvent($filter)
    {
        $date = date('Y-m-d');
                switch($filter)
        {
            case 'today':
                $data = DB::table('events')
               ->whereDate('date','=', $date)
               ->get();
                break;
            case 'previousday':
                $data = DB::table('events')
               ->whereDate('date','<', $date)
               ->get();
                break;
            case 'nextday':
                $data = DB::table('events')
               ->whereDate('date','>', $date)
               ->get();
                break;
        }
        return response()->json($data);
    }

    public function saveEvent(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:500',
            'date' => 'required|string|max:10',
            'time' => 'required|string|max:10',
            'location' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $event = new EventModel();
            $event->title = $req->input('title');
            $event->description = $req->input('description');
            $event->date = $req->input('date');
            $event->time = $req->input('time');
            $event->location = $req->input('location');
            
            if ($event->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Event added succesfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Event does not add succesfully'
                ], 500);
            }
        }
    }
    
    public function editEvent(string $id)
    {
        $event = EventModel::find($id);
        if ($event) {
            return response()->json([
                'status' => 200,
                'event' => $event
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'event' => $event,
                'message' => "No such event found"
            ]);
        }
    }

    public function updateEvent(Request $req,string $id)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:500',
            'date' => 'required|string|max:10',
            'time' => 'required|string|max:10',
            'location' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $event = EventModel::find($id);
            $event->title = $req->input('title');
            $event->description = $req->input('description');
            $event->date = $req->input('date');
            $event->time = $req->input('time');
            $event->location = $req->input('location');
            
            if ($event->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Event updated succesfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Event does not update succesfully'
                ], 500);
            }
        }
    }

    public function deleteEvent(string $id)
    {
        if (EventModel::destroy($id)) {
            return response()->json([
                'status' => 200,
                'message' => 'Event deleled succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such event found'
            ], 404);
        }
    }
}
