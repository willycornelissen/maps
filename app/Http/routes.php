<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simplemarker', function(){
    $config = array();
    $config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
    $maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
    $maps->initialize($config);
    $marker = array();
    $marker['position'] = '-19.9635888, -43.9557789';
	$maps->add_marker($marker);
	$data['map'] = $maps->create_map();

	return view('view_file', $data);
});

Route::get('/multiplemarker', function(){
	$config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
	$maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
	$maps->initialize($config);

	$marker = array();
	$marker['position'] = '-19.9635888, -43.9557789';
	$marker['infowindow_content'] = '1 - Hello World!';
	$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
	$maps->add_marker($marker);

	$marker = array();
	$marker['position'] = '-19.9635332, -43.9557685';
	$marker['draggable'] = TRUE;
	$marker['animation'] = 'DROP';
	$maps->add_marker($marker);

	$marker = array();
	$marker['position'] = '-19.9635032, -43.9557385';
	$marker['onclick'] = 'alert("You just clicked me!!")';
	$maps->add_marker($marker);
	$data['map'] = $maps->create_map();
	return view('view_file', $data);
});

Route::get('/polyline', function(){
	$config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
	$maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
	$maps->initialize($config);

	$polyline = array();
	$polyline['points'] = array('-19.9635888, -43.9557789',
				    '-18.9635888, -42.9557789',
				    '-16.9635888, -44.9557789');
	$maps->add_polyline($polyline);
	$data['map'] = $maps->create_map();
	return view('view_file', $data);
});

Route::get('/circle', function(){
	$config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
	$maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
	$maps->initialize($config);

	$circle = array();
	$circle['center'] = '-19.9635888, -43.9557789';
	$circle['radius'] = '10';
	$maps->add_circle($circle);
	$data['map'] = $maps->create_map();

	return view('view_file', $data);
});

Route::get('/rectangle', function(){
	$config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
	$maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
	$maps->initialize($config);

	$rectangle = array();
	$rectangle['positionSW'] = '-19.9635888, -43.9557789';
	$rectangle['positionNE'] = '-19.0635888, -43.0557789';
	$maps->add_rectangle($rectangle);
	$data['map'] = $maps->create_map();

	return view('view_file', $data);
});

Route::get('/direcoes', function(){
	$config['center'] = '-19.9635888, -43.9557789';
	$config['zoom'] = 'auto';
	$config['directions'] = TRUE;
	$config['directionsStart'] = 'Rua Marechal Hermes, 435, Gutierrez, Belo Horizonte';
	$config['directionsEnd'] = 'Avenida Raja Gabaglia, 3502, Belo Horizonte';
	$config['directionsDivID'] = 'directionsDiv';
	$maps = new \GeneaLabs\Phpgmaps\Phpgmaps();
	$maps->initialize($config);
	$data['map'] = $maps->create_map();

	return view('view_file', $data);
});