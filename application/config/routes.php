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
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;


// font end
$route['dat-lich-hen.html'] = 'home/dat_lich';
$route['lien-he.html'] = 'home/lien_he';
$route['san-pham'] = 'home/san_pham';
$route['hinh-anh'] = 'home/hinh_anh';
$route['gioi-thieu.html'] = 'home/gioi_thieu';
$route['catalogue'] = 'home/catalogue';
$route['catalogue/(:any)'] = 'home/catalogue_list';
$route['catalogue/(:any)/(:any).html'] = 'home/catalogue_detail';



$route['san-pham/(:any).html'] = 'home/sanpham_details';

$route['san-pham-camera.html'] = 'home/san_pham_camera';
$route['san-pham-may-tinh.html'] = 'home/san_pham_computer';

//example.com/product/4/
//$route['product/:num'] = 'catalog/product_lookup';
//
//$route['product/(:num)'] = 'catalog/product_lookup_by_id/$1';
//$route['product/(:any)'] = 'catalog/product_lookup';
//$route['products/([a-z]+)/(\d+)'] = '$1/id_$2';
//$route['login/(.+)'] = 'auth/login/$1';

// admin
$route['admin'] = 'admin/admin/index';
$route['admin/danh-sach-san-pham.html'] = 'admin/sanpham/list_san_pham';
$route['admin/danh-sach-user.html'] = 'admin/admin/danh_sach';
$route['admin/them-moi-user.html'] = 'admin/admin/user_add';
$route['admin/them-bai-moi.html'] = 'admin/admin/add_new_post';

//$route['admin/danh-sach-san-pham.html'] = 'admin/sanpham/index';
$route['admin/them-moi-san-pham.html'] = 'admin/sanpham/them_moi_san_pham';
$route['admin/sua-san-pham/(:num)'] = 'admin/sanpham/edit';

$route['admin/danh-sach-catalogue.html'] = 'admin/catalogue/index';
$route['admin/them-moi-catalogue.html'] = 'admin/catalogue/create';
$route['admin/chinh-sua-catalogue/(:num)'] = 'admin/catalogue/edit';
$route['admin/danh-sach-san-pham_catalogue.html'] = 'admin/catalogue/details_category_list';
$route['admin/them-moi-san-pham_catalogue.html'] = 'admin/catalogue/details_category_manager';
$route['admin/chinh-sua-san-pham_catalogue/(:num)'] = 'admin/catalogue/details_category_manager';

$route['admin/logout.html'] = 'admin/admin/logout';
$route['admin/login.html'] = 'admin/admin/login';



