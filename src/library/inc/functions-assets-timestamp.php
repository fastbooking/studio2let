<?php
/**
* @api{} Asset Timestamp
* @apiName AssetTimestamp
* @apiGroup AddThemeSupport
* @apiVersion 1.0.0
* @apiDescription Make all assets (css and js) have timestamp
*
* @apiExample {php} Example Usage
* // functions.php
* add_theme_support( 'rojak-assets-timestamp' );
*
*/

add_filter('style_loader_src', 'rojak_asset_timestamp', 10, 2);
add_filter('script_loader_src', 'rojak_asset_timestamp', 10, 2);

function rojak_asset_timestamp( $src, $handle ) {
	$parse_url    = parse_url($src);
	$server       = get_template_directory();
	$theme_name   = get_template();
	$server       = str_replace( "/wp-content/themes/$theme_name", '', $server );
	$file         = $server . $parse_url['path'];
	$file_modtime = '';
	if( file_exists( $file ) ) {
		$file_modtime = "&amp;mod=" . filemtime($file);
	}
	return $src . $file_modtime;
}