<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        if($author && $author->count() > 0){
            return response(["message" => "Show data success", "data" => $author], 200);
        }else{
            return response(["message" => "Data not found", "data" => null], 404);
        }
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
        $author = Author::create([
            "name" => $request->name,
            "date_of_births" => $request->date_of_births,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "hp" => $request->hp,
        ]);

        return response(["message" => "Create data success", "data" => $author], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::all();
        if($author && $author->count() > 0){
            return response(["message" => "Show data success", "data" => $author], 200);
        }else{
            return response(["message" => "Data not found", "data" => null], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $author = Author::find($id);
        // if($author){
        //     $author->name = $request->name;
        //     $author->date_of_births = $request->date_of_births;
        //     $author->place_of_birth = $request->place_of_birth;
        //     $author->gender = $request->gender;
        //     $author->email = $request->email;
        //     $author->hp = $request->hp;

        //     $author->save();
        // }
        // return $author;

        try{

            $name = $request->input('name');
            $date_of_births = $request->input('date_of_births');
            $place_of_birth = $request->input('place_of_birth');
            $gender = $request->input('gender');
            $email = $request->input('email');
            $hp = $request->input('hp');


            $data = \App\Author::where('id',$id)->first();
            $data->name = $name;
            $data->date_of_births = $date_of_births;
            $data->place_of_birth = $place_of_birth;
            $data->gender = $gender;
            $data->email = $email;
            $data->hp = $hp;

            if($data->save()){
                return response()->json([
                    'status' => true,
                    'message' => 'Data Berhasil di Update',
                ]);
            }
        }catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = \App\Author::where('id',$id)->first();
            if($data->delete()){
                return response()->json([
                    'status' => true,
                    'message' => 'Data Berhasil Delete',
                ]);
            }
        }catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}