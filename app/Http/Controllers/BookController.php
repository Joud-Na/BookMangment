<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestBookUpdate;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books= Book::query()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::query()->create($request->validated()


        );

        return $this->success("success",$book,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findorfail($id);
        return $this->success("success",$book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestBookUpdate $request, string $id)
    {
        $book = Book::where('id',$id)->update(
            $request->validated()
        );
        return $this->success("updated successfully",$book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $book = Book::find($id)->delete();
        return $this->success("done",$book);
    }
}
