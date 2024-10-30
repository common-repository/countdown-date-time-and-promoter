<?php


class countdown_date_time_promoter {


// Hook into the admin menu
 public function __construct() {

	add_action( 'admin_menu', array( $this, 'plugin_settings_page' ) );
	add_action( 'admin_init', array( $this, 'titlesDescriptions' ) );
	add_action( 'admin_init', array( $this, 'dateTime' ) );
	add_shortcode( 'countdown_date_time_promoter', array( $this, 'displayDateTime' ) );
	add_filter('widget_text','do_shortcode');

 }


// Add the menu item and page
 public function plugin_settings_page() {

	$page_title = 'Customized Countdown, Date, Time and Promoter Settings Page';
	$menu_title = 'Countdown, Date, Time and Promoter';
	$capability = 'manage_options';
	$slug = 'countdown_date_time_promoter';
	$callback = array( $this, 'plugin_settings_contents' );
	$icon = 'dashicons-admin-plugins';
	$position = 100;

  add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );

 }



 public function plugin_settings_contents() { ?>
	<div class="wrap">
		<h2>Countdown, Date, Time and Promoter Settings Page</h2>
		<h4>First click the Save button after you customize your Countdown, Date, Time, Promoter and Design on this page.</h4>
		<h4>Second use the same format specified for your customized text.</h4>
		<h4>Finally use the short code <span style="color:blue">[countdown_date_time_promoter]</span> in a post or page or as a sidebar widget to display your plugin.</h4>
		<form method="post" action="options.php">
            <?php
                settings_fields( 'countdown_date_time_promoter' ); //slug, a reference for the rest of our fields
                do_settings_sections( 'countdown_date_time_promoter' ); // is a placeholder for the sections and fields we will register elsewhere in our plugin.
                submit_button(); // will output the submit input, but it will also add some classes based on the status of the page.
            ?>
		</form>
	</div> <?php
 }


 // Add the functions of titles and descriptions on the settings page
public function titlesDescriptions () {
	add_settings_section( 'first_titleDescription', '1. Countdown Settings', array( $this, 'titlesDescriptions_callback' ), 'countdown_date_time_promoter' );
	// use this for the fields we wish to assign to the section.
	// the title 
	// callback function
	// slug
	add_settings_section( 'second_titleDescription', '2. Date and Time Settings', array( $this, 'titlesDescriptions_callback' ), 'countdown_date_time_promoter' );
	add_settings_section( 'third_titleDescription', '3. Promoter Settings', array( $this, 'titlesDescriptions_callback' ), 'countdown_date_time_promoter' );
	add_settings_section( 'fourth_titleDescription', '4. Design Settings', array( $this, 'titlesDescriptions_callback' ), 'countdown_date_time_promoter' );
}


public function titlesDescriptions_callback( $arguments ) {
	switch( $arguments['id'] ){
		case 'first_titleDescription':
			echo 'Specify a countdown date, time and text that you want!';
			break;
		case 'second_titleDescription':
			echo 'Uncheck the box if you do not want to display date or time!';
			break;
		case 'third_titleDescription':
			echo 'Check the box if you want to display promoter text!';
			break;
		case 'fourth_titleDescription':
			echo 'Create your own design with choosing design options!';
			break;
	}
}
// End of the titles and the descriptions


// Add a counter, date, time and promoter field
public function dateTime() {
   $fields = array(
	array(
		'uid' => 'first_field',
		'label' => 'Countdown:',
		'section' => 'first_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'placeholder' => '',
		'helper' => 'Show the countdown on the page!',
		'supplemental' => 'Format Example: 5d 10h 20m 5s',
		'default' => ''
	),
	array(
		'uid' => 'second_field',
		'label' => 'Date for countdown:',
		'section' => 'first_titleDescription',
		'type' => 'text',
		'options' => false,
		'placeholder' => 'January 1 2020',
		'helper' => 'Month can be written in full (January), or abbreviated (Jan)',
		'supplemental' => 'Format Example: January 1 2020',
		'default' => 'January 1 2020'
	),
	array(
		'uid' => 'third_field',
		'label' => 'Time for countdown:',
		'section' => 'first_titleDescription',
		'type' => 'text',
		'options' => false,
		'placeholder' => '15:37:25',
		'helper' => 'Each of the hour, minute and second representations should be 2 digits!',
		'supplemental' => 'Format Example: 15:37:25',
		'default' => '15:37:25'
	),
	array(
		'uid' => 'fourth_field',
		'label' => 'Choose countdown font size:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'3' => 'big',
			'2' => 'medium',
			'1' => 'small',
			'0.8' => 'x-small'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '3'
	),
	array(
		'uid' => 'fifth_field',
		'label' => 'Date:',
		'section' => 'second_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'helper' => 'Show the current date on the page!',
		'supplemental' => 'Format Example: January 1, 2020',
		'default' => ''
	),
	array(
		'uid' => 'sixth_field',
		'label' => 'Time:',
		'section' => 'second_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'helper' => 'Show the current time on the page!',
		'supplemental' => 'Format Example: 1:53 PM',
		'default' => ''
	),
	array(
		'uid' => 'seventh_field',
		'label' => 'Choose date font size:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'3' => 'big',
			'2' => 'medium',
			'1' => 'small',
			'0.8' => 'x-small'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '2'
	),
	array(
		'uid' => 'eighth_field',
		'label' => 'Choose time font size:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'3' => 'big',
			'2' => 'medium',
			'1' => 'small',
			'0.8' => 'x-small'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '1'
	),
	array(
		'uid' => 'ninth_field',
		'label' => 'Promoter:',
		'section' => 'third_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'helper' => 'Show the promoter text on the page!',
		'supplemental' => '',
		'default' => ''
	),
	array(
		'uid' => 'tenth_field',
		'label' => 'Promoter text:',
		'section' => 'third_titleDescription',
		'type' => 'textarea',
		'options' => false,
		'helper' => '',
		'placeholder' => 'Hurry up and do not miss the chance!',
		'supplemental' => 'Your promoter text character length should not be more than 150!',
		'default' => 'Hurry up and do not miss the chance!'
	),
	array(
		'uid' => 'eleventh_field',
		'label' => 'Choose promoter text font size:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'3' => 'big',
			'2' => 'medium',
			'1' => 'small',
			'0.8' => 'x-small'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '1'
	),
	array(
		'uid' => 'twelfth_field',
		'label' => 'Promoter link:',
		'section' => 'third_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'helper' => 'Show the promoter link on the page!',
		'supplemental' => '',
		'default' => ''
	),
	array(
		'uid' => 'thirteenth_field',
		'label' => 'Promoter url:',
		'section' => 'third_titleDescription',
		'type' => 'text',
		'options' => false,
		'helper' => '',
		'placeholder' => '',
		'supplemental' => 'Format Example: wordpress.com',
		'default' => 'wordpress.com'
	),
	array(
		'uid' => 'fourteenth_field',
		'label' => 'Promoter link text:',
		'section' => 'third_titleDescription',
		'type' => 'text',
		'options' => false,
		'helper' => '',
		'placeholder' => '',
		'supplemental' => 'Your promoter link text character length should not be more than 150!',
		'default' => 'Click here for details!'
	),
	array(
		'uid' => 'fifteenth_field',
		'label' => 'Choose promoter link font size:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'3' => 'big',
			'2' => 'medium',
			'1' => 'small',
			'0.8' => 'x-small'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '0.8'
	),
	array(
		'uid' => 'sixteenth_field',
		'label' => 'Countdown over text:',
		'section' => 'first_titleDescription',
		'type' => 'text',
		'options' => false,
		'helper' => '',
		'placeholder' => '',
		'supplemental' => 'Type your countdown over text!',
		'default' => 'EXPIRED!'
	),
	array(
		'uid' => 'seventeenth_field',
		'label' => 'Background color:',
		'section' => 'fourth_titleDescription',
		'type' => 'checkbox',
		'options' => true,
		'helper' => 'Display background color!',
		'supplemental' => '',
		'default' => ''
	),
	array(
		'uid' => 'eighteenth_field',
		'label' => 'Choose background color:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'#ffffd5' => 'Cream',
			'#f7fafc' => 'Alice Blue',
			'#f7f2f2' => 'White Smoke',
			'#34abd7' => 'Summer Sky',
			'#e5f9f5' => 'Clear Day',
			'#f8eccd' => 'Gin Fizz',
			'#f7f6f0' => 'Alabaster',
			'#71a13f' => 'Sushi',
			'#c4d9d5' => 'Geyser',
			'#30beaa' => 'Light Sea Green',
			'#c93c2e' => 'Persian Red',
			'#f75f2e' => 'Outrageous Orange',
			'#222222' => 'Nero Black'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '#f7f2f2'
	),
	array(
		'uid' => 'nineteenth_field',
		'label' => 'Choose font color:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'#ffffd5' => 'Cream',
			'#f7fafc' => 'Alice Blue',
			'#34abd7' => 'Summer Sky',
			'#e5f9f5' => 'Clear Day',
			'#fcf9f9' => 'Snow',
			'#f7f6f0' => 'Alabaster',
			'#efeeee' => 'Whisper',
			'#475a57' => 'Dark Slate',
			'#1a9599' => 'Java',
			'#f7f2f2' => 'White Smoke',
			'#222222' => 'Nero Black',
			'#c93c2e' => 'Persian Red',
			'#f75f2e' => 'Outrageous Orange'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => '#222222'
	),
	array(
		'uid' => 'twentieth_field',
		'label' => 'Choose text align:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'center' => 'Center',
			'left' => 'Left'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => 'center'
	),
	array(
		'uid' => 'twentyoneth_field',
		'label' => 'Choose promote text font weight:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'bold' => 'Bold',
			'normal' => 'Normal'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => 'normal'
	),
	array(
		'uid' => 'twentysecond_field',
		'label' => 'Choose promote link text underline:',
		'section' => 'fourth_titleDescription',
		'type' => 'select',
		'options' => array(
			'underline' => 'Underline',
			'none' => 'None'
		),
		'helper' => '',
		'supplemental' => '',
		'default' => 'none'
	)
   );
	foreach( $fields as $field ){
		add_settings_field( $field['uid'], $field['label'], array( $this, 'dateTime_callback' ), 'countdown_date_time_promoter', $field['section'], $field );
		register_setting( 'countdown_date_time_promoter', $field['uid'] );
	}
}


public function dateTime_callback( $arguments ) {
    $value = get_option( $arguments['uid'] ) ; // Get the current value, if there is one
    // get_option('first_field')

    if( empty($value) ) { // If no value exists
        $value = $arguments['default'];// Set to default
    } else if ( strlen($value) > 150 ) { // If value character length more than 150
    	$value = $arguments['default']; // Set to default
    }

	// Check which type of field we want
  switch( $arguments['type'] ){
	case 'text': // If it is a text field
		printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s"  maxlength="150" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], sanitize_text_field($value) );
		break;
	case 'textarea': // If it is a textarea
         printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50" maxlength="150">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], sanitize_text_field($value) );
		break;
	case 'select': // If it is a select dropdown
		if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
			$options_markup = '';
			foreach( $arguments['options'] as $key => $label ){
				$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
			}
			printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
		}
		break;
	case 'checkbox': // If it is a checkbox
		$checkValue = '<input type="'.$arguments['type'].'" id="'.$arguments['uid'].'" name="'.$arguments['uid'].'" value="1"' . checked( 1, $value, false ) . '/>';
		echo $checkValue;
		break;
  }

	// If there is help text
    if( $helper = $arguments['helper'] ){
        printf( '<span class="helper"> %s</span>', $helper ); // Show it
    }

	// If there is supplemental text
    if( $supplimental = $arguments['supplemental'] ){
        printf( '<p class="description">%s</p>', $supplimental ); // Show it
    }
}
// End of Add a date, time field


// Display all the contents on the page
public function displayDateTime() {

	$displayJustCountdown = get_option('first_field');
	$displayDate = get_option('second_field');
	$displayTime = get_option('third_field');
	$displayFontSizeCountdown = get_option('fourth_field');
	$displayJustDate = get_option('fifth_field');
	$displayJustTime = get_option('sixth_field');
	$displayFontSizeDate = get_option('seventh_field');
	$displayFontSizeTime = get_option('eighth_field');
	$displayJustPromoterText = get_option('ninth_field');
	$displayPromoterText = get_option('tenth_field');
	$displayFontSizePromoterText = get_option('eleventh_field');
	$displayJustPromoteLink = get_option('twelfth_field');
	$displayPromoteUrl = get_option('thirteenth_field');
	$displayPromoteLinkText = get_option('fourteenth_field');
	$displayFontSizePromoterLink = get_option('fifteenth_field');
	$displayCountDownOverText = get_option('sixteenth_field');
	$displayJustBackgroundColor = get_option('seventeenth_field');
	$displayBackgroundColor = get_option('eighteenth_field');
	$displayFontColor = get_option('nineteenth_field');
	$displayTextAlign = get_option('twentieth_field');
    $displayFontWeight  = get_option('twentyoneth_field');
    $displayLinkUnderline  = get_option('twentysecond_field');

require CFC_PATH.'/app/index.php';

}
// End of Display function









} // End of Class


?>