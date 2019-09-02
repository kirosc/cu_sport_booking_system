<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//route redirect control
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['announcement/id/:num'] = 'Announcement/details';

$route['course'] = 'Course/course_main';
$route['course/page/:num'] = 'Course/course_main';
$route['course/course_apply_payment_finish'] = 'Course/course_apply_payment_finish';
$route['course/id/:num'] = 'Course/detail';
$route['course/id/:num/apply'] = 'Course/apply_check';

$route['add_course'] = 'Course/add_course_page';
$route['course/check_add_course'] = 'Course/check_add_course';
$route['course/course_add_payment_finish'] = 'Course/course_add_payment_finish';

$route['court_booking'] = 'Court_booking/book_court';
$route['court_booking/payment_finish'] = 'Court_booking/payment_finish';

$route['session_share'] = 'Session_share/session_share_main';
$route['session_share/id/:num/join'] = 'Session_share/join';
$route['session_share/id/:num/:num'] = 'Session_share/detail';

$route['login'] = 'Login/login_main';
$route['register'] = 'Login/register_main';

$route['profile/edit_profile'] = 'Profile/edit_profile';
$route['profile/update_profile'] = 'Profile/update_profile';
$route['change_password/:any'] = 'Profile/change_password';
$route['profile/change_password_check'] = 'Profile/change_password_check';
$route['profile/test'] = 'Profile/test';
$route['profile/:any'] = 'Profile/profile_main';
$route['schedule/:any'] = 'Profile/schedule';


$route['admin/session'] = 'Admin/session';
$route['admin/user'] = 'Admin/user';

$route['about_us'] = 'Home/about_us';
