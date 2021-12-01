<?php

namespace App\Http\Controllers;

use App\Http\Requests\zoom\StoreZoomRequest;
use App\Http\Traits\CreateZoomMeatingTrait;
use App\Models\Grade;
use App\Models\Online;
use Exception;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineController extends Controller
{
    use CreateZoomMeatingTrait;
    public function index()
    {
        $onlineSessions = Online::all();
        return view('online.index', compact('onlineSessions'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('online.create', compact('grades'));
    }

    public function store(StoreZoomRequest $request)
    {
        try {
            $meeting = $this->createMeating($request);
            Online::create([
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('online.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Online $online)
    {
        try {
            Zoom::meeting()->find($online->meeting_id)->delete();
            $online->delete();

            toastr()->success(trans('messages.delete'));
            return redirect(route('online.index'));

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
