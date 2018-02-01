<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Repositories\CourseRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ModuleRepository;
use App\Validators\CourseValidator;
use App\Services\CourseService;
use Auth;

class CoursesController extends Controller
{

    /**
     * @var CourseRepository
     */
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(CourseRepository $repository, CourseValidator $validator, CourseService $service, CategoriesRepository $categoriesRepository, ModuleRepository $moduleRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
        $this->categoriesRepository  = $categoriesRepository;
        $this->moduleRepository  = $moduleRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $courses = $this->repository->all();

	
		$title = "Cursos - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.courses.index',['courses' => $courses]);
		echo view('admin.footer');
    }
	
	public function create(){
		$categories_list = $this->categoriesRepository->selectBoxList();
		
		$title = "Adicionar Curso - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.courses.create', ['categories'=> $categories_list])->render();
		echo view('admin.footer')->render();
	}

    public function archive(){
      $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $courses = $this->repository->all();
		$categories = $this->categoriesRepository->getPrimaryCategories();

		$title = "Cursos - Escola LTG";
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('courses/courses', ['courses' => $courses]);
		echo view('footer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCreateRequest $request){
		 $request = $this->service->store($request->all()); 
		 $course = $request['success'] ? $request['data'] : null;
		 
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }

	public function edit($course){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$modules_list = $this->moduleRepository->selectBoxList();
		$course = $this->repository->find($course);
		$atual_category = $this->categoriesRepository->getAtualCategoryInfo($course['category_id']);
		
		$title = "Editar " . $course['title']." - Escola LTG";
		echo view('admin.header', ['title' => $title]);
		echo view('admin.courses.edit', ['course' => $course, 'categories' => $categories_list, 'atual_category' => $atual_category])->render();
		echo view('admin.footer')->render();
	}
	
	public function manage($course){
		$course = $this->repository->find($course);
		$title = "Gerenciar " . $course['title']." - Escola LTG";
		
		echo view('admin.header', ['title' => $title]);
		echo view('admin.courses.manage', ['course' => $course])->render();
		echo view('admin.footer')->render();
	}
	
	public function single($course){
		$course = $this->repository->find($course);
		$modules_list = $this->moduleRepository->findByField('course_id',$course['id']);
		$categories = $this->categoriesRepository->getPrimaryCategories();
		// $user_joined = $this->repository->findWhere(['course_id'=> $course->id, 'user_id' => Auth::user()->id]);
		$title =  $course['title']." - Escola LTG";
		
		echo view('header', ['title' => $title, 'categories' => $categories]);
		echo view('courses/course', ['course' => $course, 'modules' => $modules_list])->render();
		echo view('footer')->render();
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id){
		 $request = $this->service->update($request->all(), $id); 
		 $course = $request['success'] ? $request['data'] : null;
		  
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
    public function destroy($id){
       $request = $this->service->delete($id);
		 $course = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
	
	public function enterCourse(Request $request){
		$course = $request->query->get('course_id');
		$user = $request->query->get('user_id');
		return  $this->repository->enter_course($course, $user);
	}
}
