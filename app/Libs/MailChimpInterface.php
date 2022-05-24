<?php

/**
 * A basic mailChimp helper Interface.
 * 
 * @author Yusuf Caliskan   
 * @email  yusufocaliskan@gmail.com
 * -----------------------------------------------------
 */


namespace App\Libs;

interface MailChimpInterface{

    
    /**
     * Get all the records
     */
    public static function all();

    /**
     * Gets the record by it's email adress
     * 
     * @param string $email address
     */
    public static function get_by_email($email);

    /**
     * Updates data
     * 
     * @param string $email  it will be used update the data 
     * @param array $data the update data
     */
    public static function save($data, $email);

    /**
     * Delete a record by e-mail address
     * 
     * @param string $email email adress
     */
    public static function delete($email);
    
}