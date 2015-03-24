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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'pois';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//cualquier petición get entra al index_get()
$route["pois"]["get"] = "pois/index";

//si la petición es del tipo GET y tiene la forma localhost/codeigniter/restangular/pois/(cualquier número)
//es decir, va con un parámetro, la dirección se convertirá en pois/find/(ese cualquier número de antes)
//y por lo tanto se irá al método index_find($id), donde $id = $1
$route["pois/(:num)"]["get"] = "pois/find/$1";

//cualquier petición POST se irá al método index_post()
$route["pois"]["post"] = "pois/index";

//cuando sea una petición PUT con la forma blablablah/pois/(número cualquiera)
//se irá al método index_put($id), donde $id=$1
$route["pois/(:num)"]["put"] = "pois/index/$1";

//Si la petición es de tipo DELETE
$route["pois/(:num)"]["delete"] = "pois/index/$1";



//os recuerdo que para añadir parámetros es en plan /$1/$2/$3...
//que equivale a 								/param1/param2/param3...