<?php

/*
	Plugin Name: Simple Social Sharing
	Plugin URI: http://www.question2answer.org/qa/31585
	Plugin Description: Adds Simple Clickable Social Sharing Buttons Below Questions
	Plugin Version: 1.4
	Plugin Date: 2014-02-01
	Plugin Author: Digitizor Media
	Plugin Author URI: http://digitizormedia.com
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

qa_register_plugin_layer(
	'qa-simple-social-sharing-layer.php', // PHP file containing layer
	'Simple Social Sharing Layer' // human-readable name of layer
);

qa_register_plugin_module(
	'module', // type of module
	'qa-simple-social-sharing-module.php', // PHP file containing module class
	'qa_simple_social_sharing_module', // name of module class
	'Simple Social Sharing Options' // human-readable name of module
);

qa_register_plugin_module(
	'widget', // type of module
	'qa-simple-social-sharing-widget.php', // PHP file containing module class
	'qa_simple_social_sharing_widget', // module class name in that PHP file
	'Simple Social Sharing Widget' // human-readable name of module
);
