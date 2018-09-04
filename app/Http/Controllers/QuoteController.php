<?php

namespace App\Http\Controllers;

use App\Author;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($author_name = Input::get('author_name')) {
            $quotes = Quote::whereHas(
                'author',
                function ($query) use ($author_name) {
                    $query->where('name', 'like', '%' . $author_name . '%');
                }
            )->paginate();
        } else {
            $quotes = Quote::paginate();
        }

        return $quotes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Quote::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return $quote;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        $quote->update($request->all());

        return $quote->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response('', 204);
    }
}
