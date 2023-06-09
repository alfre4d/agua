<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends School 
{

    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        
    }
    
    
}