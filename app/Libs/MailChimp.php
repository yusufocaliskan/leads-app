<?php

/**
 * A basic mailChimp helper.
 * 
 * @author Yusuf Caliskan   
 * @email  yusufocaliskan@gmail.com
 * -----------------------------------------------------
 */

namespace App\Libs;

use Illuminate\Http\Request;

class MailChimp {


    public static function all()
    {
        
    }

    public static function get_by_email($email)
    {

    }

    public static function save($data, $email)
    {   
       
        $listId = env('MAILCHIMP_LIST_ID');

        $mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));

        $campaign = $mailchimp->campaigns->create('regular', [
            'list_id' => $listId,
            'subject' => 'Example Mail',
            'from_email' => 'yusufocaliskan@gmail.com',
            'from_name'=>'test'

        ], [
            'html' => '',
            'text' => strip_tags('')
        ]);

        //Send campaign
        $mailchimp->campaigns->send($campaign['id']);

        dd('Campaign send successfully.');
    }

    public static function delete($email)
    {

    }
    
}