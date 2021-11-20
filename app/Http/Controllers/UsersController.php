<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\StoreRequest;

use App\Repositories\Eloquent\UserRepository;

use App\Http\Resources\Users\Resource as UserResource;

class UsersController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Return list of users.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function index(Request $request)
    {
        $page = $request->get("page") ?? 0;
        $perPage = $request->get("perPage") ?? 15;

        return $this->response(
            UserResource::collection(
                $this->userRepository->all($page, $perPage)
            ),
            200
        );
    }

    /**
     * Return a user by id.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return void
     */
    public function show(int $id)
    {
        $user = $this->userRepository->find($id);

        return $this->response(new UserResource($user), 200);
    }

    /**
     * Create a new user.
     *
     * @param \App\Http\Requests\Users\StoreRequest $request
     *
     * @return void
     */
    public function store(StoreRequest $request)
    {
        try {
            $user = $this->userRepository->create($request->all());
            return $this->response(new UserResource($user), 201);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }
}
