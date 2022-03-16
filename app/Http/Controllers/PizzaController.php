<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Models\Pizza;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('id', 'desc')->paginate(2);
        return view('pizza.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request)
    {
        // dd($request->all());
        // $validated = $request->validate([

        // ]);
        $file_name = $this->saveImage($request->image,'images/pizza');
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_pizza_price'=> $request->small_pizza_price,
            'medium_pizza_price'=> $request->medium_pizza_price,
            'large_pizza_price'=> $request->large_pizza_price,
            'category' => $request->category,
            'image' => $file_name
        ]);
        return redirect ()->route('pizza.index')->with( 'message', 'Pizza added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        return view('pizza.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaStoreRequest $request, $id)
    {
       $file_name = $this->saveImage($request->image,'images/pizza');
       $pizza = Pizza::findOrFail($id);
       $pizza->name                 = $request->name;
       $pizza->description          = $request->description;
       $pizza->small_pizza_price    = $request->small_pizza_price;
       $pizza->medium_pizza_price   =$request->medium_pizza_price;
       $pizza->large_pizza_price    = $request->large_pizza_price;
       $pizza->category             = $request->category;
       $pizza->image = $file_name;
        $pizza->save();

        return redirect ()->route('pizza.index')->with( 'message', 'Pizza Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect ()->route('pizza.index')->with( 'message', 'Pizza Deleted successfully!');
    }
}
