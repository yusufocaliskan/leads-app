<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads as LeadsModel;

class Leads extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        //-------------- [ Make some validation ] ---------------
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'terms'=>'required'
        ]);


        //Clear it
        //$data['terms'] = $data['terms'] ? 'yes' : 'no';
        $create = LeadsModel::create($data);
         if($create)
         {
            return response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'Your application has been successfully received. We will contact with you via the mail you submitted.'
                ]
            ],200);
        }
        
        return response([
            'error'=>[
                'type'=>'danger',
                'message'=>'Opps! There are some unexpected errors. Try aganin late.'
            ]
        ],422);

        

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
