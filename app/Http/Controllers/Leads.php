<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads as LeadsModel;
use App\Libs\MailChimp;
use Newsletter;

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
        $leads = LeadsModel::orderBy("created_at","desc")->get();
        
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
           $resp = response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'Your application has been successfully received. We will contact with you via the mail you submitted.'
                ]
            ],200);

            //Add it to MailChimp List
            $name = explode(' ', $data['name']);
            Newsletter::subscribe($data['email'], ['FNAME'=>$name[0], 'LNAME'=>$name[0]]);
        
           return $resp;
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
        //Validata
        $data = $request->validate([
            'email'=>'required|email|string',
            'name'=>'required|string',
            'terms'=>'required'
        ]);
        
        $update = LeadsModel::where('_id', $id)
          ->update($data);
        if($update)
        {
            $resp = response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'The record has updated.'
                ]
            ],200);



            //We will update if there is an email with the given one
           //else we add.
            $name = explode(' ', $data['name']);
            Newsletter::subscribeOrUpdate($data['email'], ['FNAME'=>$name[0], 'LNAME'=>$name[0]]);

            //TODO: Delete the if there is
            if($this->is_mail_exists($data['email']))
            {
                //Delete the old one.
                //We don't need it anymore.
                //Newsletter::delete($eamil);   
            }


            return $resp;
    
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
    public function destroy(Request $request, $leadId)
    {   
       
        
        $eamil = $request->email;
        $delete = LeadsModel::destroy($leadId);
        
        if($delete)
        {
            $resp =  response([
                'error'=>[
                    'type'=>'success',
                    'message'=>'The record deleted.'
                ]
            ],200);

            //Delete it from mailChimp as well
            Newsletter::delete($eamil);

            return $resp;
        }

        return response([
            'error'=>[
                'type'=>'danger',
                'message'=>'An unexpected error thrown.'
            ]
        ],422);

    }

    /**
     * Checks if the entered e-mail is already exists
     * 
     * @param string $email the mail that would control
     */
    private function is_mail_exists($email)
    {
        if (LeadsModel::where('email', '=', $email)->exists()) {
            return true;
         }
    }
}
