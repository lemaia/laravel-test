<?php

use App\Http\Controllers\SaveGitHubUserDataController;
use Illuminate\Support\Facades\Route;

Route::post('/salvar-local', SaveGitHubUserDataController::class);
