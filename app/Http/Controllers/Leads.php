<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads as LeadsModel;

class Leads extends Controller
{
    /**
     * Lists all the leads in the database
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Get all the data 
        $leads = LeadsModel::get();
        

        //An response it.
        return response([
            'leads'=>$leads
        ]);
    }

    /**
     * Creates new leads
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //-------------- [ Make some validation ] ---------------
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if(empty($id))
        {
            return response([
                'error'=>'Select a lead'
            ],422);    
        }

        $lead = LeadsModel::find($id);
       
        if($lead)
        {
            return response([
                'lead'=>$lead
            ],200);
        }

        return response([
            'error'=>'An error occurred'
        ],422);

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
        $data = $request->validate([
            'email'=>'required|email|string',
            'name'=>'required|string',
            'terms'=>'required'
        ]);
        
        $update = LeadsModel::where('_id', $id)
          ->update($data);
        if($update)
        {
            return response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'The record has updated.'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($leadId)
    {
        $delete = LeadsModel::destroy($leadId);
        
        if($delete)
        {
            return response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'The record deleted.'
                ]
            ],200);
        }

        return response([
            'error'=>[
                'type'=>'danger',
                'message'=>'An unexpected error thrown.'
            ]
        ],422);

    }
}
