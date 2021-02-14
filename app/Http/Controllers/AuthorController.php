<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use DB;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of authors.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Create a new author.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse("Author " . $author->name . " created with id: " . $author->id, Response::HTTP_CREATED);
    }

    /**
     * Display details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function show($authorId)
    {
        $author = Author::findOrFail($authorId);
        return $this->successResponse($author);
    }

    /**
     * Update details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:7|in:male,female',
            'country' => 'max:255'
        ];

        $this->validate($request, $rules);
        $author = Author::findOrFail($authorId);

        $author->fill($request->all());

        if ($author->isClean()) {
            DB::rollback();
            return $this->errorResponse("At least on value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();
        return $this->successResponse($author, Response::HTTP_OK);
    }

    /**
     * Delete one author.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($authorId)
    {

        $author = Author::findOrFail($authorId);

        $author->delete();

        return $this->successResponse($author->name . " with id " . $author->id . " has ben deleted.", Response::HTTP_OK);
    }
}
