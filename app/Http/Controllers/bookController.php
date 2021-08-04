<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Book::all();
        return view('backend.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('backend.products.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $path = $request->file('image')->store('image', 'public');

        $products = new Book();
        $products->name = $request->name;
        $products->author = $request->author;
        $products->category()->associate($request->category);
        $products->price = $request->price;
        $products->description = $request->description;
        $products->image = $path;
        $products->save();
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Book::findOrFail($id);
        $categorys = Category::all();
        return view('backend.products.update', compact('product', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $path= $request->file('image')->store('image','public');
//        dd($path);
        $product = Book::findOrFail($id);
        $product->name = $request->name;
        $product->author = $request->author;
        $product->category()->associate($request->category);
        $product->price = $request->price;
        $product->description = $request->description;
//        $product->image= $path;
//      dd($request);
        $product->save();
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd(1);
        $product= Book::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
