<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $items = [
                ["id" => 1, 'name' => 'first item', 'price' => 12.0],
                ["id" => 2, 'name' => 'second item', 'price' => 33.87],
                ["id" => 3, 'name' => 'third item', 'price' => 31.17],
            ];
            return response()->json($items, 200);
        } catch (Exception $error) {
            return response()->json(['status' => 0, 'message' => 'error'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $items = [
                "1" => ["id" => 1, 'name' => 'first item', 'price' => 12.0, 'imageURL' => "https://m.media-amazon.com/images/I/91hT4Y3BwyL._AC_SL1500_.jpg", "type" => 'phone', 'similar' => [
                    ["id" => 2, 'name' => 'second item', 'price' => 33.87],
                    ["id" => 3, 'name' => 'third item', 'price' => 31.17],
                ]],
                "2" => ["id" => 2, 'name' => 'second item', 'price' => 33.87, 'imageURL' => "https://m.media-amazon.com/images/I/81dLz2Et6qS._AC_SL1500_.jpg", "type" => 'phone', 'similar' => [
                    ["id" => 1, 'name' => 'first item', 'price' => 12.0],
                    ["id" => 3, 'name' => 'third item', 'price' => 31.17],
                ]],
                "3" => ["id" => 3, 'name' => 'third item', 'price' => 31.17, 'imageURL' => "", "type" => 'phone', 'similar' => [
                    ["id" => 1, 'name' => 'first item', 'price' => 12.0],
                    ["id" => 2, 'name' => 'second item', 'price' => 33.87],
                ]],
            ];
            $item = $items[$id];
            return response()->json($item, 200);
        } catch (Exception $error) {
            return response()->json(['status' => 0, 'message' => 'error'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
