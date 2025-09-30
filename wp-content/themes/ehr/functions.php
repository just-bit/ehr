<?php

add_action('wp_enqueue_scripts', 'ehr_enqueue_scripts', 10, 3);
function ehr_enqueue_scripts()
{
	wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0');
	wp_enqueue_style('css', get_template_directory_uri() . '/assets/css/application.css', array(), '3.9');
}

add_filter('script_loader_tag', 'ehr_add_defer_attribute', 10, 2);

function ehr_add_defer_attribute($tag, $handle)
{
    $handles = array(
        'vendor-js',
        'app',
    );

    foreach ($handles as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }

    return $tag;
}

show_admin_bar(false);

// menu
add_theme_support('menus');
register_nav_menus(array(
    'header_menu' => 'Header Menu Main',
    'header_menu_mobile' => 'Header Menu Mobile',
    'footer_menu_main' => 'Footer Menu Main',
    'footer_menu_bottom' => 'Footer Menu Bottom',
));

// options
add_action('init', 'ea_acf_options_page');
function ea_acf_options_page()
{
    if (function_exists('ea_acf_options_page')) {
        acf_add_options_page('Contacts');
        acf_add_options_page('Options');
    }
}


// svg
add_filter('upload_mimes', 'svg_upload_allow');
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}
	if ($dosvg) {

		if (current_user_can('manage_options')) {
			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		} else {
			$data['ext'] = false;
			$data['type'] = false;
		}
	}
	return $data;
}
