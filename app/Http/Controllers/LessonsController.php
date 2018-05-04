<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\LessonRepository;
use App\Repositories\LessonsMetaRepository;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;
use App\Validators\LessonValidator;
use App\Services\LessonService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;

class LessonsController{

	protected $repository;
	protected $validator;

	public function __construct(LessonRepository $repository, LessonsMetaRepository $lessons_meta_repository, LessonValidator $validator, LessonService $service,CourseRepository $courseRepository, ModuleRepository $moduleRepository){
		$this->repository 							= $repository;
		$this->validator  							= $validator;
		$this->service  								= $service;
		$this->course_repository  			= $courseRepository;
		$this->module_repository  			= $moduleRepository;
		$this->lessons_meta_repository  = $lessons_meta_repository;
	}

	/* USUÁRIO */

	public function single($course_id, $lesson_id){
		$course = $this->course_repository->find($course_id);
		$lesson = $this->repository->find($lesson_id);
		$totalLessons = count($course->getLessons);

		$prevLesson = (($lesson->position) <= 0) ? false : $this->repository->findWhere(['course_id'=> $course_id, 'position'=>  ($lesson->position) - 1])->first();
		$prevLesson = (!$prevLesson) ? false : $prevLesson->id;
		$nextLesson = (($lesson->position) == ($totalLessons - 1)) ? false : $this->repository->findWhere(['course_id'=> $course_id, 'position'=>  ($lesson->position) + 1])->first();
		$nextLesson = (!$nextLesson) ? false : $nextLesson->id;

		$is_completed = $this->lessons_meta_repository->IsCompleted($lesson_id);

		$url = $lesson->video_url;
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);
		$id = $matches[1];
		$video_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $id . '?rel=0&autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';

		return view('courses.lessons.single', ['title' => $lesson->title, 'course' => $course, 'lesson' => $lesson, 'video' => $video_embed, 'is_completed' => $is_completed, 'prevLesson' => $prevLesson, 'nextLesson' => $nextLesson]);
	}

	public function markAsCompleted(){
		$course = Input::get('course');
		$lesson = Input::get('lesson');
		$user   = Auth::user()->id;

		$complete = DB::table('lessons_meta');
		if($complete->insert(['course_id' => $course, 'lesson_id' => $lesson, 'user_id' => $user, 'type' => 'completed_lesson'])){
			return response()->json(['success'=>'Got Simple Ajax Request.']);
		}

	}

	/* PAINEL */

	public function create($course, $module){
		$title = "Adicionar Aula - Stephenson";
		$atual_course = $this->course_repository->find($course);
		$atual_module = $this->module_repository->find($module);

		return view('admin.lessons.create', [
			'title' => $title,
			'course' => $atual_course,
			'module' => $atual_module
		]);
	}


	public function edit($course, $module, $lesson){
		$course = $this->course_repository->find($course);
		$module = $this->module_repository->find($module);
		$lesson = $this->repository->find($lesson);
		$title = "Editar " . $lesson->title ." - Stephenson";

		return view('admin.lessons.edit', [
			'title' => $title,
			'course' => $course,
			'module' => $module,
			'lesson' => $lesson
		]);
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  LessonCreateRequest $request
	*
	* @return \Illuminate\Http\Response
	*/
	public function store(LessonCreateRequest $request){
		$request = $this->service->store($request->all());
		$lesson = $request['success'] ? $request['data'] : null;


		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
		]);

		return redirect()->back();
	}

	public function update(Request $request, $course_id, $module_id, $lesson_id){
		$request = $this->service->update($request->all(), $lesson_id);
		$lesson = $request['success'] ? $request['data'] : null;

		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
		]);

		return redirect()->back();
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int $id
	*
	* @return \Illuminate\Http\Response
	*/
	public function destroy($course_id, $module_id, $lesson_id){
		$request= $this->service->delete($lesson_id);
		$lesson = $request['success'] ? $request['data'] : null;

		session()->flash('success',[
			'success' =>	$request['success'],
			'messages' =>	$request['messages']
		]);

		return redirect()->back();
	}

	public function reorder(){
		$lesson_id = Input::get('lessonId');
		$lesson_index = Input::get('lessonIndex');
		$lesson_module = Input::get('lessonModule');

		return DB::table('lessons')->where('id', '=', $lesson_id)->update(array('position' => $lesson_index, 'module_id' => $lesson_module));
	}

	public function load_form($lesson, $form){
		return view('admin.lessons.forms.'. $form, ['lesson' => $lesson, 'material' => $form]);
	}

	public function createMaterial(LessonCreateRequest $request, $lesson, $material){
		$lesson = $lesson;
		$material = substr($material, 4);
		$title= $request->title;
		$content = $request->content;

		if($create = $this->repository->create_material($lesson, $material, $title, $content)){
		return redirect()->back();
		}

	}
}
