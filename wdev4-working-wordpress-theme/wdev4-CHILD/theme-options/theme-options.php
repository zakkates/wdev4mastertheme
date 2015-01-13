<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'simpleedge_options', 'simpleedge_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'simpleedgetheme' ), __( 'Theme Options', 'simpleedgetheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'simpleedgetheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'simpleedgetheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'simpleedgetheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'simpleedgetheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'simpleedgetheme' )
	),
	'5' => array(
		'value' => '5',
		'label' => __( 'Five', 'simpleedgetheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'simpleedgetheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'simpleedgetheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'simpleedgetheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'simpleedgetheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved', 'simpleedgetheme' ); ?></strong></p></div>
		<?php endif; ?>
	<form method="post" action="options.php">
			<?php settings_fields( 'simpleedge_options' ); ?>
			<?php $options = get_option( 'simpleedge_theme_options' ); ?>
		<table class="form-table">

				<?php
				/**
				 * A simpleedge checkbox option
				 */
				?>
			<tr valign="top">
				<th scope="row"><?php _e( 'A checkbox', 'simpleedgetheme' ); ?></th>
				<td>
					<input id="simpleedge_theme_options[option1]" name="simpleedge_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
					<label class="description" for="simpleedge_theme_options[option1]"><?php _e( 'simpleedge checkbox', 'simpleedgetheme' ); ?></label>
				</td>
			</tr>

				<?php
				/**
				 * A simpleedge text input option
				 */
				?>
			<tr valign="top">
				<th scope="row"><?php _e( 'Some text', 'simpleedgetheme' ); ?></th>
				<td>
					<input id="simpleedge_theme_options[sometext]" class="regular-text" type="text" name="simpleedge_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
					<label class="description" for="simpleedge_theme_options[sometext]"><?php _e( 'simpleedge text input', 'simpleedgetheme' ); ?></label>
				</td>
			</tr>

				<?php
				/**
				 * A simpleedge select input option
				 */
				?>
			<tr valign="top">
				<th scope="row"><?php _e( 'Select input', 'simpleedgetheme' ); ?></th>
				<td>
					<select name="simpleedge_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
					</select>
					<label class="description" for="simpleedge_theme_options[selectinput]"><?php _e( 'simpleedge select input', 'simpleedgetheme' ); ?></label>
				</td>
			</tr>

				<?php
				/**
				 * A simpleedge of radio buttons
				 */
				?>
			<tr valign="top">
				<th scope="row"><?php _e( 'Radio buttons', 'simpleedgetheme' ); ?></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'simpleedgetheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
						<label class="description">
							<input type="radio" name="simpleedge_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?>
						</label><br />
								<?php
							}
						?>
					</fieldset>
				</td>
			</tr>

				<?php
				/**
				 * A simpleedge textarea option
				 */
				?>
			<tr valign="top">
				<th scope="row"><?php _e( 'Insert Text', 'simpleedgetheme' ); ?></th>
				<td>
					<textarea id="simpleedge_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="simpleedge_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
					<label class="description" for="simpleedge_theme_options[sometextarea]"><?php _e( 'This is where you put some text', 'simpleedgetheme' ); ?></label>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'simpleedgetheme' ); ?>" />
		</p>
	</form>
	<div class="updated fade">
		<h3>Here's some advice on using these theme options within your theme. *note, all php assumes you've included them within php brackets.</h3>
		<p>Using your checkbox: (If it is checked it will return a '1', if it is not checked it will return a '0'.</p>
		<blockquote>$options = get_option('simpleedge_theme_options');
			echo $options['option1'];</blockquote>
			
					<p>Using your text box titled "some text": </p>
		<blockquote>$options = get_option('simpleedge_theme_options');
			echo $options['sometext'];</blockquote>
			
			<p>Using your "Select Input": *note, the values of the input you choose can only return numerical values.</p>
		<blockquote>$options = get_option('simpleedge_theme_options');
			echo $options['selectinput'];</blockquote>
			
			<p>Using your "Radio Buttons":</p>
		<blockquote>$options = get_option('simpleedge_theme_options');
			echo $options['radioinput'];</blockquote>
			
			
			<p>Using your "Some Text Area":</p>
		<blockquote>$options = get_option('simpleedge_theme_options');
			echo $options['sometextarea'];</blockquote>
			
		<h3>Here would be a more advanced usage of the Theme Options.</h3>
		<p>In this example we are using the check box to determine whether or not we want to display something. We will first grab the array, then we can use the array in 'if else then' statements. </p>

		<blockquote>
?php  $options = get_option('simpleedge_theme_options'); <br />
 if ( $options['option1'] == 1 ) { ?<br />
one <br />
?php } else if ( $options['option1'] == 0 ) { ?<br />
two <br />
?php } else { ?<br />
three<br />
?php } ?<br />
		</blockquote> 

	</div>
</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}
