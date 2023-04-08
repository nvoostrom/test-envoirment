<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->userRepository->getAllUser()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userDetails = $request->only([
            'name',
            'email'
        ]);

        return response()->json(
            [
                'data' => $this->userRepository->createUser($userDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $userId = $request->route('id');

        return response()->json([
            'data' => $this->userRepository->getUserById($userId)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = $request->route('id');
        $userDetails = $request->only([
            'name',
            'email'
        ]);

        return response()->json([
            'data' => $this->userRepository->updateUser($userId, $userDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userId = $request->route('id');
        $this->userRepository->deleteUser($userId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
