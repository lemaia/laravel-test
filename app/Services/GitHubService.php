<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GitHubService
{

    /**
     * Save the GitHub user data.
     *
     * @param string $username
     * @return void
     */
    public function saveGitHubUserData(string $username): void
    {
        $gitHubUserData = $this->getUserData(username: $username);
        $this->saveUserData(username: $username, githubUserData: $gitHubUserData);
    }

    /**
     * Get the GitHub user data from the GitHub API.
     *
     * @param string $username
     * @return string
     */
    private function getUserData(string $username): string
    {
        $response = Http::get("https://api.github.com/users/$username");
        return $response->body();
    }

    /**
     * Save the GitHub user data in a local file.
     *
     * @param string $username
     * @param string $githubUserData
     * @return void
     */
    private function saveUserData(string $username, string $githubUserData): void
    {
        Storage::disk('local')->put("$username.json", $githubUserData);
    }
}
