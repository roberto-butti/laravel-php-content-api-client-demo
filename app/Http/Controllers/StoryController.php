<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storyblok\Api\StoriesApi;
use Storyblok\Api\Request\StoryRequest;

class StoryController extends Controller
{
    public function __construct(
        private StoriesApi $storiesApi
    ) {}

    public function show(string $slug = 'home')
    {
        $response = $this->storiesApi->bySlug($slug, new StoryRequest());

        return view('story', ['story' => $response->story]);
    }

    public function preview(Request $request)
    {
        $story = $request->input('story');

        if (!$story) {
            return response()->json(['error' => 'No story provided'], 400);
        }

        return view('story', ['story' => $story]);
    }
}
