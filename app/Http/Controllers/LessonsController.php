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

class LessonsController extends Controller
{

    /**
     * @var LessonRepository
     */
    protected $repository;

    /**
     * @var LessonValidator
     */
    protected $validator;

    public function __construct(LessonRepository $repository, LessonValidator $validator, LessonService $service,CourseRepository $courseRepository, ModuleRepository $moduleRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		 
        $this->course_repository  = $courseRepository;
        $this->module_repository  = $moduleRepository;
    }
	
	public function reorder(){
		$rs = DB::table('modules');
		$lesson_id = Input::get('lessonId');
		$lesson_index = Input::get('lessonIndex');
		
		foreach ($rs as $s){
			return DB::table('lessons')->where('id', '=', $lesson_id)->update(array('position' => $lesson_index));
		}
	}

	public function single($course_id, $lesson_id){
		$course = $this->course_repository->find($course_id);
		$lesson = $this->repository->find($lesson_id);
		$url = $lesson->video_url;
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

		$id = $matches[1];
		$video_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $id . '" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';
		
		echo view('courses.lessons.header_lesson', ['title' => $lesson->title, 'course' => $course, ]);
		echo view('courses.lessons.single', ['lesson' => $lesson, 'video' => $video_embed]);
		echo view('courses.lessons.footer_lesson');
	}
	
	public function create($course, $module){
		$title = "Adicionar Aula - Escola LTG";
		$atual_course = $this->course_repository->find($course);
		$atual_module = $this->module_repository->find($module);
		
		echo view('admin.header', ['title' => $title]);
		echo view('admin.lessons.create', ['course' => $atual_course, 'module' => $atual_module]);
		echo view('admin.footer');
	}
	
	public function load_form($lesson, $form){
		echo view('admin.lessons.forms.'. $form, ['lesson' => $lesson, 'material' => $form]);
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
	
	public function edit($course, $module, $lesson){
		$course = $this->course_repository->find($course);
		$module = $this->module_repository->find($module);
		$lesson = $this->repository->find($lesson);
		
		$title = "Editar " . $lesson->title ." - Escola LTG";
		
		echo view('admin.header', ['title' => $title]);
		echo view('admin.lessons.edit', ['course' => $course, 'module' => $module, 'lesson' => $lesson]);
		echo view('admin.footer');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  LessonCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LessonCreateRequest $request)
    {
		 $request = $this->service->store($request->all()); 
		 $lesson = $request['success'] ? $request['data'] : null;
		 
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LessonUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
        /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
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
}
