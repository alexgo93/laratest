<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @var PostService $postService
     */
    protected $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {

        $posts = $this->postService->index();

        return view('index', compact('posts'));
    }

    /**
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function create(PostRequest $request)
    {

        $this->postService->create($request);

        return back()->with(['status' => 'Post created successfully']);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function read($id)
    {

        $post = $this->postService->read($id);

        return view('edit', compact('post'));

    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {

        $post = $this->postService->update($request, $id);

        return redirect()->back()->with('status', 'Post has been updated succesfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $this->postService->delete($id);

        return back()->with(['status' => 'Deleted successfully']);
    }
}
