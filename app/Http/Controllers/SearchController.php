<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Post;
use App\Entities\Tutorial;
use App\Entities\Course;

class SearchController {
  public function search(Request $q){
    $title = "Resultados para: ". $q->q;

    $results_posts = Post::where('title', 'LIKE', '%'.$q->q.'%')->get();
    $results_tutorial = Tutorial::where('title', 'LIKE', '%'.$q->q.'%')->get();
    $results_courses = Course::where('title', 'LIKE', '%'.$q->q.'%')->get();

    return view('search', [
      'title' => $title,
      'posts' => $results_posts,
      'tutorials' => $results_tutorial,
      'courses' => $results_courses,
    ]);
  }
}
