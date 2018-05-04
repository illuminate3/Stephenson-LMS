<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserActivitiesCreateRequest;
use App\Http\Requests\UserActivitiesUpdateRequest;
use App\Repositories\UserActivitiesRepository;
use App\Validators\UserActivitiesValidator;
use App\Services\UserActivitiesService;


class UserActivitiesController{

    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(UserActivitiesRepository $repository, UserActivitiesValidator $validator, UserActivitiesService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserActivitiesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserActivitiesCreateRequest $request){
  		$request = $this->service->store($request->all());

  		session()->flash('success',[
  			'success' =>	$request['success'],
  			'messages' =>	$request['messages']
  		]);

  		return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserActivitiesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserActivitiesUpdateRequest $request, $id){
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $userActivity = $this->repository->update($request->all(), $id);
            $response = [
                'message' => 'UserActivities updated.',
                'data'    => $userActivity->toArray(),
            ];

            if ($request->wantsJson()) {
              return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'UserActivities deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserActivities deleted.');
    }
}
