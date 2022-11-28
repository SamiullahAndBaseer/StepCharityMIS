<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('admin.inventory.items_list', ['inventories'=> $inventories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.inventory.add_item', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'office' => 'required',
            'category_id' => 'required',
            'description' => 'required|string|max:100',
            'serial' => 'required',
            'manufacture' => 'required',
            'model' => 'required',
            'date_purchase' => 'required|date',
            'checkout_instock' => 'required',
            'quantity' => 'required|numeric',
            'total_cost_lc' => 'required|numeric',
            'total_cost_usd' => 'required|numeric',
            'donation_purchase' => 'required',
            'location' => 'required|string',
            'vendor' => 'required',
            'condition' => 'required',
            'age_in_year' => 'required',
            'useful_life' => 'required',
            'current_value_lc' => 'required|numeric',
            'current_value_usd' => 'required|numeric',
        ],[
            'category_id'=> 'The category field is required.',
        ]);

        $category = Category::find($request->category_id);

        $cat_code = str_split($category->name, 3)[0];
        $tag_no = 'SCEO'.'-'.Str::upper($cat_code).random_int(100, 999);

        Inventory::insert([
            'tag_no' => $tag_no,
            'office' => $request->office,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'serial' => $request->serial,
            'manufacture' => $request->manufacture,
            'model' => $request->model,
            'date_purchase' => $request->date_purchase,
            'user_id' => Auth::user()->id,
            'checkout_instock' => $request->checkout_instock,
            'quantity' => $request->quantity,
            'total_cost_lc' => $request->total_cost_lc,
            'total_cost_usd' => $request->total_cost_usd,
            'donation_purchase' => $request->donation_purchase,
            'location' => $request->location,
            'vendor' => $request->vendor,
            'condition' => $request->condition,
            'age_in_year' => $request->age_in_year,
            'useful_life' => $request->useful_life,
            'current_value_lc' => $request->current_value_lc,
            'current_value_usd' => $request->current_value_usd,
        ]);

        session()->flash('item_added', 'Item added successfully.');
        return redirect()->route('inventory.index');
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
    public function edit($id)
    {
        $categories = Category::all();
        $inventory = Inventory::findOrFail($id);
        return view('admin.inventory.edit_item', ['categories'=> $categories, 'inventory'=> $inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'office' => 'required',
            'category_id' => 'required',
            'description' => 'required|string|max:100',
            'serial' => 'required',
            'manufacture' => 'required',
            'model' => 'required',
            'date_purchase' => 'required|date',
            'checkout_instock' => 'required',
            'quantity' => 'required|numeric',
            'total_cost_lc' => 'required|numeric',
            'total_cost_usd' => 'required|numeric',
            'donation_purchase' => 'required',
            'location' => 'required|string',
            'vendor' => 'required',
            'condition' => 'required',
            'age_in_year' => 'required',
            'useful_life' => 'required',
            'current_value_lc' => 'required|numeric',
            'current_value_usd' => 'required|numeric',
        ],[
            'category_id'=> 'The category field is required.',
        ]);

        Inventory::findOrFail($request->id)->update([
            'office' => $request->office,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'serial' => $request->serial,
            'manufacture' => $request->manufacture,
            'model' => $request->model,
            'date_purchase' => $request->date_purchase,
            'user_id' => Auth::user()->id,
            'checkout_instock' => $request->checkout_instock,
            'quantity' => $request->quantity,
            'total_cost_lc' => $request->total_cost_lc,
            'total_cost_usd' => $request->total_cost_usd,
            'donation_purchase' => $request->donation_purchase,
            'location' => $request->location,
            'vendor' => $request->vendor,
            'condition' => $request->condition,
            'age_in_year' => $request->age_in_year,
            'useful_life' => $request->useful_life,
            'current_value_lc' => $request->current_value_lc,
            'current_value_usd' => $request->current_value_usd,
        ]);

        session()->flash('item_updated', 'Item updated successfully.');
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Inventory::findOrFail($id)->delete();
        session()->flash('item_deleted', 'Item deleted successfully');
    }
}
