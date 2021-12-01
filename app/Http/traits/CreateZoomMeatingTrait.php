<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

trait CreateZoomMeatingTrait {
    public function createMeating($request) {
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone'),
        ];

        $meeting = Zoom::meeting()->make($meetingData);

        $meetingSettings =[
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ];

        $meeting->settings()->make($meetingSettings);

        return $user->meetings()->save($meeting);
    }
}