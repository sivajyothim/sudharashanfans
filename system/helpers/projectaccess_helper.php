<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('isAdminLogin'))    
{
    function isAdminLogin()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata(ADMIN_SESS_CODE.'adminid');
       if(!isset($is_logged_in) || $is_logged_in != true)
       {
           redirect(ADMIN_LINK.'login');
       }       
    }
    //Checking whether Vendor is logged in or not
    function vendorLoginCheck()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata(VS_EXT.'userid');
       if(!isset($is_logged_in) || $is_logged_in != true)
       {
           redirect(base_url().'vendor-signup');
       }       
    }
}