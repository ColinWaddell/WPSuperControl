<?php
/*
   Plugin Name: Super Control Wordpress Plugin
   Plugin URI: 
   Description: Blah
   Author: Colin Waddell
   Version: 0.1
   Author URI: http://colinwaddell.com
*/

function wpSuperControl( $atts ) {
	$atts = shortcode_atts( array(
		'siteID' =>  51,
		'cottageID' =>  195562,
		'ownerID' => 25,
                'mode' => 'calendar'
	), $atts);


  wp_enqueue_style( 'wpsupercontrol-custom' );

  switch($atts['mode']){
  
    case 'calendar':
        return '<script type="text/javascript" src="//secure.supercontrol.co.uk/avail_ajax/js/load.js?ownerID='.$atts['ownerID'].
          '&siteID='.$atts['siteID'].
          '&cottageID='.$atts['cottageID'].'"></script><div id="supercontrol-availability"></div>';
      break;


    case 'availability':
      return '<iframe src="http://secure.supercontrol.co.uk/availability/owner_form.asp?ownerID='.$atts['ownerID'].
        '&siteID='.$atts['siteID'].
        '&cottageID='.$atts['cottageID'].'" style="height: 150px;" frameborder="0"></iframe>';
      break;

    case 'testimonials':
      return '<iframe src="https://secure.supercontrol.co.uk/testimonials/index.asp?ownerID='.$atts['ownerID'].
        '&siteID='.$atts['siteID'].
        '&cottageID='.$atts['cottageID'].'" style="height: 150px;" frameborder="0"></iframe>';
      break;

  }

  return "";
}

wp_register_style( 'wpsupercontrol-custom', plugins_url('/WPSuperControl/css/wp-supercontrol.custom.css') );
add_shortcode('wpsupercontrol', 'wpSuperControl');

?>

