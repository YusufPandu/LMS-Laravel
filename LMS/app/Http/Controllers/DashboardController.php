<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            // Admin data
            $data = [
                'title' => 'Admin Dashboard',
                'stats' => [
                    'Users' => \App\Models\User::count(),
                    'Courses' => \App\Models\Course::count(),
                ],
            ];
        } elseif ($user->role_id == 2) {
            // Instructor data
            $data = [
                'title' => 'Instructor Dashboard',
                'stats' => [
                    'My_Course' => \App\Models\Course::where('instructor_id', $user->id)->count(),
                    'Assignments' => 12,
                    'Students' => 50,
                ],
            ];
        } else {
            // Student data
            $data = [
                'title' => 'Student Dashboard',
                'stats' => [
                    'Assignments_Submitted' => 8,
                    'progress' => '75%',
                ],
            ];
        }

        return view('dashboard.index', compact('user', 'data'));
    }
}
