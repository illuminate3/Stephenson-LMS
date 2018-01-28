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

	public function create($course, $module){
		$title = "Adicionar Aula - Escola LTG";
		$atual_course = $this->course_repository->find($course);
		$atual_module = $this->module_repository->find($module);
		
		echo view('admin.header', ['title' => $title]);
		echo view('admin.lessons.create', ['course' => $atual_course, 'module' => $atual_module]);
		echo view('admin.footer');
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
