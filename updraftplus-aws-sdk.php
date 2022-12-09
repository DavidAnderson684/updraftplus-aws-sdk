<?php
// @codingStandardsIgnoreStart
/*
Plugin Name: UpdraftPlus AWS SDK
Plugin URI: https://updraftplus.com
Description: This plugin contains the AWS SDK for UpdraftPlus plugin.
Author: UpdraftPlus.Com, DavidAnderson
Version: 1.0.0
Update URI: https://wordpress.org/plugins/updraftplus-aws-sdk/
Donate link: https://david.dw-perspective.org.uk/donate
License: GPLv3 or later
Text Domain: updraftplus-aws-sdk
Domain Path: /languages
Author URI: https://updraftplus.com
*/
// @codingStandardsIgnoreEnd

add_action('init', 'updraftplus_init_aws_sdk');

function updraftplus_init_aws_sdk() {
	if (!defined('UPDRAFTPLUS_DIR')) return;
	add_filter('updraftplus_indicate_s3_class_prefer_aws_sdk', '__return_true');
	add_action('updraftplus_load_aws_sdk', 'updraftplus_load_aws_sdk');
}

function updraftplus_load_aws_sdk() {
	global $updraftplus;
	if (is_callable(array($updraftplus, 'potentially_remove_composer_autoloaders'))) $updraftplus->potentially_remove_composer_autoloaders(array('GuzzleHttp\\', 'Aws\\'));
	include(dirname(__FILE__).'/vendor/autoload.php');
}
