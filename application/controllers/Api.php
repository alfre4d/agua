<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
    /*
        Software: EduAppGT PRO - School Management System
        Author: GuateApps - Software, Web and Mobile developer.
        Author URI: https://guateapps.app.
        PHP: 5.6+
        Created: 27 September 16.
    */
        
class Api extends EduAppGT
{
    //Api constructor.
    function __construct()
    {
      parent::__construct();
      $this->load->database(); 
      //if($this->authorization() != 'success') die;
    }
    
   
    
}