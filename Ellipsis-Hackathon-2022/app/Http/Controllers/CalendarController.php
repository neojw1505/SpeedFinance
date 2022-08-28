<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Reminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*Load The Calendar with Reminders or Events*/
    function load()
    {
        /* Holidays */
        $response = Http::get('https://data.gov.sg/api/action/datastore_search?resource_id=550f6e9e-034e-45a7-a003-cf7f7e252c9a&limit=11');
        $holidays = $response->json()['result']['records'];
        foreach ($holidays as $h) {
            $holiday[] = (object) [
                'id' => $h['_id'],
                'title' => $h['holiday'],
                'start' =>  $h['date'],
                'end' => $h['date'],
                'description' => $h['holiday']
            ];
        }

        /* Reminders */
        // RM
        if (Auth::user()->isRm() || Auth::user()->isManager()) {
            $reminders = DB::table('reminders')->where('created_by', '=', Auth::user()->id)->get();
            $reminders = json_decode($reminders, true);
            foreach ($reminders as $r) {
                $reminder[] = (object) [
                    'id' => $r['id'],
                    'title' => $r['title'],
                    'start' =>  $r['dateTime'],
                    'end' => $r['dateTime'],
                    'description' => $r['detail'],
                    'editable' => true
                ];
            }
            if (count($reminders) == 0) {
                $reminder = null;
            }

            return view('calendar.loadCalendar', compact('holiday', 'reminder'));
        }

        /* Reminders */
        // Manager
        if (Auth::user()->isAdmin()) {
            $reminders = Reminder::all();
            $reminders = json_decode($reminders, true);
            foreach ($reminders as $r) {
                $reminder[] = (object) [
                    'id' => $r['id'],
                    'title' => $r['title'],
                    'start' =>  $r['dateTime'],
                    'end' => $r['dateTime'],
                    'description' => $r['detail'],
                    'editable' => true
                ];
            }
            if (count($reminders) == 0) {
                $reminder = null;
            }
            return view('calendar.loadCalendar', compact('holiday', 'reminder'));
        }
    }

    // /*JSON data of Reminders*/
    // public function jsonData()
    // {
    //     return view('calendar.reminder_json_feed');
    // }

    /*Reminders updated in database if drag and dropped in calendar*/
    public function update()
    {
        $obj = json_decode(file_get_contents('php://input'), true);
        echo DB::table('reminders')->where('id', $obj['id'])->update(['dateTime' => $obj['start']]);
    }

    /*Delete reminder from Calendar */
    function destroy($id)
    {
        echo json_encode($id);

        DB::table('reminders')->delete($id); // delete from DB
    }

    /*Update reminder from Calendar */
    function updateCalendar(Request $request)
    {
        // dd($request->all());

        $user = Auth::user()->id;
        $reminder = Reminder::where('id', '=', $request->id);
        $reminder->update([
            'title' => $request->editModalTitle,
            'detail' => $request->editModalDesc,
            'dateTime' => $request->date ." ". Carbon::parse($request->time)->format('H:i:s'),
            'updated_by' => $user
        ]);
        $audit_controller = new AuditController;
        $audit_controller->create('Update Reminder', "Updated Reminder #" .$reminder->id . " is  by " . Auth::user()->name);
        return redirect()->route('loadCalendar')->with('toast-success', 'Reminder Updated');
    }
}
