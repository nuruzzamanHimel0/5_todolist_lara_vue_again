<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Items::orderBy('id','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->item['name'];
        $createItem = Items::create([
            'name' => $request->item['name'],
            'completed' => $request->item['name'] ? true : false,
            'completed_at' => $request->item['name'] ? Carbon::now() : ''
        ]);
        if($createItem){
            return response()->json([
                'status' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id){

        $updateItem = Items::where('id',$id)->update([
            'completed' => $request->item['completed'] ? true : false,
            'completed_at' => $request->item['completed'] ? Carbon::now() : null
        ]);
        if($updateItem){
            return response()->json([
                'status' => 'success'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $item = Items::find($id);
        if($item->delete()){
            return response()->json([
                'status' => 'success'
            ]);
        }
    }
}
