<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SaveGitHubUserDataController extends Controller
{
    protected $githubService;

    public function __construct(GitHubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'username' => 'required|string'
        ], [
            'username.required' => 'O nome do usuário é obrigatório.'
        ])->validate();

        $this->githubService->saveGitHubUserData(username: $request->username);

        return response()->json([
            'message' => 'Dados do usuário salvos com sucesso.',
        ], 201);
    }
}
