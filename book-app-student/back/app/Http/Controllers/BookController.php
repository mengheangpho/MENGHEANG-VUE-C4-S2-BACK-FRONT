<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBooks()
    {
        //
        return Book::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBook(Request $request)
    {
        //
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        return response()->json(
            [
                'book' => $book,
                'mss' => 'Book created successfully',
                'status' => 201
            ],201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBook($id)
    {
        //
        $book = Book::FindOrFail($id);
        if($book){
            return response()->json(['book'=>$book],201);
        }
        else{
            return response()->json('Book Not found',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request, $id)
    {
        //
        $book = Book::FindOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();

        $mss = 'Book Id: '.$id.' is updated successfully';
        return response()->json([
            'mss' => $mss,
            'status' => 200
        ],201
    );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBook($id)
    {
        //
        $book =  Book::destroy($id);
        $mss = 'Book Id: '.$id.' is deleted successfully';
        if($book){
            return response()->json(['mss'=>$mss],201);
        }
        else{
            return response()->json('Book Not found',404);
        }
        
    }
}
