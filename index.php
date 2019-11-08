<?php

	require_once '_inc/config.php';

	$routes = [

		// HOMEPAGE
		'/' => [
			'GET'  => 'home.php'
		],

        // RSS
        'rss' => [
            'GET'  => 'rss.php'
        ],


	];

	$page   = segment(1);
	$method = $_SERVER['REQUEST_METHOD'];

//	// guests
//	$public = [
//		'login', 'register'
//	];
//
//	// not logged in, you can only visit $public links
//	if ( !logged_in() && !in_array( $page, $public ) ) {
//		redirect('/login');
//	}

	// show page
	if ( ! isset( $routes["/$page"][$method] ) ) {
		show_404();
	}

    $page   = segment(1);
    $method = $_SERVER['REQUEST_METHOD'];
	require $routes["/$page"][$method];