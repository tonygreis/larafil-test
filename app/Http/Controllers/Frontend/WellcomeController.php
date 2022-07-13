<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function welcome()
    {
        $courses = Course::with('media')->orderBy('updated_at', 'desc')->take(8)->get();
        $posts = Post::with(['tags', 'media'])->orderBy('updated_at', 'desc')->take(8)->get();
        $lessons = Lesson::orderBy('updated_at', 'desc')->take(8)->get();
        $topics = Topic::with('media')->get();

        return view('welcome', compact('posts', 'courses', 'lessons', 'topics'));
    }
}
