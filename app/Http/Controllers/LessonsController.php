<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\LessonRepository;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;
use App\Validators\LessonValidator;
use App\Services\LessonService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LessonsController{

	protected $repository;
	protected $validator;

	public function __construct(LessonRepository $repository, LessonValidator $validator, LessonService $service,CourseRepository $courseRepository, ModuleRepository $moduleRepository){
		$this->repository = $repository;
		$this->validator  = $validator;
		$this->service  = $service;
		$this->course_repository  = $courseRepository;
		$this->module_repository  = $moduleRepository;
	}

	/* USUÁRIO */

	public function single($course_id, $lesson_id){
		$course = $this->course_repository->find($course_id);
		$lesson = $this->repository->find($lesson_id);
		$url = $lesson->video_url;
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

		$id = $matches[1];
		$video_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $id . '?rel=0&autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';

		return view('courses.lessons.single', ['title' => $lesson->title, 'course' => $course, 'lesson' => $lesson, 'video' => $video_embed]);
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
		$rs = DB::table('modules');
		$lesson_id = Input::get('lessonId');
		$lesson_index = Input::get('lessonIndex');

		foreach ($rs as $s){
			return DB::table('lessons')->where('id', '=', $lesson_id)->update(array('position' => $lesson_index));
		}
	}

	public function load_form($lesson, $form){
		return view('admin.lessons.forms.'. $form, ['lesson' => $lesson, 'material' => $form]);
	}

	public function createMaterial(LessonCreateRequest $request, $lesson, $material){
		$lesson = $lesson;
		$material = $material;
		$title= $request->title;
		$content = $request->content;

		if($create = $this->repository->create_material($lesson, $material, $title, $content)){
		return redirect()->back();
		}

	}
}
