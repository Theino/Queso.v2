<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Vinelab\Http\Client as HttpClient;
use App\Announcement;
use Illuminate\Http\Request;

/**
 * Class AnnouncementController
 * @package App\Http\Controllers\Frontend
 */
class AnnouncementController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($course_id) {
        $announcements = Announcement::where('course_id', '=', $course_id)
                        ->orderBy('created_at')
                        ->get();
        return view('frontend.announcements', ['announcements' => $announcements])
            ->withUser(access()->user());
    }

    public function create($course_id)
    {
        return view('frontend.manage.announcements.create', ['course_id' => $course_id])
            ->withUser(access()->user());
    }

    public function details($id) {
        $announcement = Announcement::find($id);

        return view('frontend.manage.announcements.details', ['announcement' => $announcement, 'course_id' => $announcement->course_id])
            ->withUser(access()->user());

    }

    public function update(Request $request)
    {
        $announcement = Announcement::find($request->announcement_id);
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->sticky = $request->has('sticky');
        $announcement->course_id = $request->course_id;
        $announcement->save();
        return redirect()->route('announcements.manage', $request->course_id)->withFlashSuccess($announcement->title . " has been updated");
    }

    public function save(Request $request) {
        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->course_id = $request->course_id;
        $announcement->sticky = $request->has('sticky');
        $announcement->save();
        return redirect()->route('announcements.manage', $request->course_id)->withFlashSuccess($announcement->title . " has been created");
    }

    public function show($id) {
        $announcement = Announcement::find($id);
        $announcement->sticky = true;
        $announcement->save();
        return redirect()->route('announcements.manage', $announcement->course_id)->withFlashSuccess($announcement->title . " now shown on dashboard");
    }

    public function hide($id) {
        $announcement = Announcement::find($id);
        $announcement->sticky = false;
        $announcement->save();
        return redirect()->route('announcements.manage')->withFlashSuccess($announcement->title . " now hidden from dashboard");

    }

    public function delete(Request $request) {
        $announcement = Announcement::find($request->announcement_id);
        $title = $announcement->title;
        $course_id = $announcement->course_id;
        $announcement->delete();
        return redirect()->route('announcements.manage', $course_id)->withFlashSuccess($announcement->title . " has been removed");
    }

    public function manage($course_id)
    {
        $announcements = Announcement::where('course_id', '=', $course_id)->get();
     //   $announcements = Announcement::all();
        return view('frontend.manage.announcements.index', ['announcements' => $announcements, 'course_id' => $course_id])
            ->withUser(access()->user());
    }    
}
