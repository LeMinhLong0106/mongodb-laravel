<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'pages' => 'required',
        //     'image' => 'required',
        //     'author_id' => 'required'
        // ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientoriginalName();
        $path = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $requestData['image'] = '/storage/' . $path;

        Book::create($requestData);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'pages' => 'required',
        //     'author_id' => 'required'
        // ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientoriginalName();
        $path = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $requestData['image'] = '/storage/' . $path;

        $book->update([
            'name' => $request->name,
            'price' => $request->price,
            'pages' => $request->pages,
            'image' => '/storage/' . $path,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}