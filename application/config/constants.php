<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
/****************************************************************************************************/
$url_details=$_SERVER['HTTP_HOST'];
$url_details.=str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']);/*For Getting the project(Hosting Name)*/
$final_url='http://'.$url_details;
/*--------------------------------------------------------------------------
 *  Project Realted Constants defining here
 ----------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| RESPONSE Codes(for Developer Purpose)
|--------------------------------------------------------------------------
 */
define('DATE',date('Y-m-d H:i:s'));
define('QUERY_DEBUG',1);
define('QUERY_MESSAGE','query_show');
define('QUERY_DEBUG_MESSAGE','query_debug');
define('CODE','code');
define('MESSAGE','message');
define('DESCRIPTION','description');
define('INSERTED_ID','inserted_id');
define('DB_ERROR','dberror');
define('SUCCESS_CODE',200);
define('FAIL_CODE',204);
define('VALIDATION_CODE',301);
define('EXISTS_CODE',422);
define('INTERNAL_SERVER_ERROR_CODE',500);
define('DB_ERROR_CODE',575);
define('DEBUG_CODE',1771);

define('PROJECT_ASSETS',$final_url.'assests/');

define('DESIGNED_BY','Vgrow Media ');
define('DESIGNED_LINK','http://vgrowmedia.com/');
define('ADMIN_THEME','theme-cyan');
define('PROJECT_THEME','theme-cyan');
define('ADMIN_BREADCRUMB_THEME','breadcrumb-bg-pink');

define('SITE_PHONE','+91-98989898');
define('SITE_EMAIL','info@sidharshanfans.com');
/*
|--------------------------------------------------------------------------
| Super admin Module Code 
|--------------------------------------------------------------------------
 */
define('PROJECT_NAME','Sudharshan Fans');
define('ADMIN_ASSETS',$final_url.'assets/');
define('LIBS_PATH',$final_url.'libs/');
define('ADMIN_CSS_PATH',ADMIN_ASSETS.'css/');
define('ADMIN_JS_PATH',ADMIN_ASSETS.'js/');
define('ADMIN_PROJECT_PATH',ADMIN_ASSETS.'project/');
define('ADMIN_IMAGES_PATH',ADMIN_ASSETS.'images/');
define('ADMIN_PLUGIN_PATH',ADMIN_ASSETS.'plugins/');
define('ADMIN_SCRIPTS_PATH',ADMIN_ASSETS.'scripts/');
define('ADMIN_LINK',$final_url.'admin/');
define('ADMIN_HEADER_PATH','admin/includes/header');
define('ADMIN_FOOTER_PATH','admin/includes/footer');
define('ADMIN_SIDESWITCH_PATH','admin/includes/sideswitch');
define('ADMIN_SIDEBAR_PATH','admin/includes/navbar');
define('ADMIN_FAV',ADMIN_IMAGES_PATH.'logo.png');

define('FAVICON_PATH',ADMIN_IMAGES_PATH.'logo.png');
define('ADMIN_LOGO',ADMIN_IMAGES_PATH.'logo.png');
define('ADMIN_PROJECT_JS',ADMIN_ASSETS.'project/superadmin/');
define('ROLE_FAIL_LINK',$final_url.'superadmin/');
define('ADMIN_SESS_CODE','C_ADMIN');
define('ADMIN_SIDEBAR_ENABLE',0);
/*
|--------------------------------------------------------------------------
| Super admin Module Code   END
|--------------------------------------------------------------------------
 */



/*
|--------------------------------------------------------------------------
 * Sessions Related Code Start
 --------------------------------------------------------------------------
 */
define('MADMIN_SESS_CODE','DEVAKI_ADMIN_');


define('SITE_DOMAIN','sudharshanfans.com');
define('emailtemplatefolder','email_templates/');
define('SITE_MODE',1);/*1 : LIVE & 0 : LOCALHOST*/
define('SMTP_FROM_EMAIL',(SITE_MODE==1)?'info@sudharshanfans.com':'seshu.');
define('SMTP_FROM_NAME',SITE_DOMAIN);
define('BCC_EMAIL','jyothi.phpdeveloper@gmail.com');
define('SMTP_PORT',(SITE_MODE==1)?25:465); 
define('SMTP_USER',(SITE_MODE==1)?'secure@sudharshanfans.com':'knsr1987@gmail.com');
define('SMTP_PASSWORD',(SITE_MODE==1)?'gHf*g7?~[?7x':'reddy*123');
define('SMTP_HOST',(SITE_MODE==1)?'mail.sudharshanfans.com':'ssl://smtp.gmail.com');
define('SMTP_PROTOCAL',(SITE_MODE==1)?'mail':'smtp');
define('logo_theme','blue');
define('SITE_NAME','sudharshan fans');
define('SITE_CODE','SF_');

define('ADMIN_TABLE_RESPONSIVE','col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white');


/*>>Sessions Setup */
define('US_EXT','CSU_');
define('VS_EXT','CSV_');
define('CS_EXT',SITE_CODE.'vgrow');
define('CS_SECURITY','jyothi_');

/*>> Vendor Module Section Module code start */
define('VENDOR_ASSETS',$final_url.'vendor_assests/');
define('VENDOR_CSS_PATH',VENDOR_ASSETS.'css/');
define('VENDOR_JS_PATH',VENDOR_ASSETS.'js/');
define('VENDOR_IMAGES_PATH',VENDOR_ASSETS.'images/');
define('VENDOR_APP_PATH',VENDOR_ASSETS.'projectjs/');
define('VENDOR_SCRIPTS_PATH',VENDOR_ASSETS.'scripts/');
define('VENDOR_LINK',$final_url.'vendor/');
define('VENDOR_HEADER_PATH','vendor/includes/header');
define('VENDOR_FOOTER_PATH','vendor/includes/footer');
define('VENDOR_SIDESWITCH_PATH','vendor/includes/sideswitch');
define('VENDOR_SIDEBAR_PATH','vendor/includes/navbar');
define('VENDOR_SESS_CODE','C_VENDOR_');
define('VENDOR_SIDEBAR_ENABLE',1);
/*>> Vendor Module Section Module code end*/

/*>> Front Module Section Module code start */
define('FRONT_ASSETS',$final_url.'front_assests/');
define('FRONT_CSS_PATH',FRONT_ASSETS.'css/');
define('FRONT_FONTS_PATH',FRONT_ASSETS.'fonts/');
define('FRONT_JS_PATH',FRONT_ASSETS.'js/');
define('FRONT_IMAGES_PATH',FRONT_ASSETS.'images/');
define('PRODUCT_DUMMY_PIC',FRONT_ASSETS.'images/product_dummy.jpg');
define('FRONT_VENDOR_PATH',FRONT_ASSETS.'vendor/');
define('FRONT_LINK',$final_url.'');

define('FRONT_SIDESWITCH_PATH','includes/sideswitch');
define('FRONT_SIDEBAR_PATH','includes/navbar');
define('FRONT_SESS_CODE','C_USER_');
define('FRONT_SIDEBAR_ENABLE',1);
define('FRONT_HEADER_PATH','includes/header');
define('FRONT_FOOTER_PATH','includes/footer');
define('FRONT_CATEGORY_SLIDER_PATH','includes/spl_categories_slider');
define('FRONT_SEO_PATH','includes/seo');
/*>> Front Module Section Module code end*/


/*>>Social Links module section code start */
define('SOCIAL_FACEBOOK','javascript:void(0)');
define('SOCIAL_GOOGLE','javascript:void(0)');
define('SOCIAL_TWITTER','javascript:void(0)');
define('SOCIAL_INSTAGRAM','javascript:void(0)');
define('SOCIAL_LINKEDIN','javascript:void(0)');
/*>>Social Links module section code end */
define('LOGO_PATH',FRONT_IMAGES_PATH.'icons/logo.png');
define('LOOADING_IMAGE',FRONT_IMAGES_PATH.'loader_image.gif');
define('avatorpic',LOGO_PATH);
define('VENOR_LINK_PATH',LOGO_PATH);
define('VEG_ICON',VENDOR_IMAGES_PATH.'veg.png');
define('NONVEG_ICON',VENDOR_IMAGES_PATH.'nonveg.png');
