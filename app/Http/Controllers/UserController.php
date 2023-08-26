<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\CreateUserRequestDTO;
use App\Contracts\Services\UserServiceInterface;


class UserController extends Controller
{
    protected $userService;
    protected $createUserRequestDTO;
    public function __construct(
        UserServiceInterface $userService,
        CreateUserRequestDTO $createUserRequestDTO
    ) {
        $this->userService = $userService;
        $this->createUserRequestDTO = $createUserRequestDTO;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->createUserRequestDTO
            ->setData($request->all())
            ->validateRequestData();

        $this->userService->createUser($validatedData);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }
}
?>
