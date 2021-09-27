<?php 

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="POST" action="options.php">
				<?php
                    settings_fields( 'section' );
                    do_settings_sections( 'theme-options' );
                    submit_button();
				?>
		</form>
	</div>
<?php }

// Email
function setting_email() {
    ?>
	<input type="email" name="email" id="email" value="<?= get_option( 'email' ); ?>" />
    <?php
}

// Telp
function setting_phone() {
    ?>
	<input type="text" name="phone" id="phone" value="<?= get_option( 'phone' ); ?>" />
    <?php
}

// Telp
function setting_address() {
    ?>
	<textarea type="text" name="address" id="address"><?= get_option( 'address' ); ?></textarea>
    <?php
}

// Twitter
function setting_twitter() { 
    ?>
	<input type="text" name="twitter" id="twitter" value="<?= get_option( 'twitter' ); ?>" />
    <?php 
}
// Facebook
function setting_facebook() { 
    ?>
	<input type="text" name="facebook" id="facebook" value="<?= get_option( 'facebook' ); ?>" />
    <?php 
}
// Instagram
function setting_instagram() { 
    ?>
	<input type="text" name="instagram" id="instagram" value="<?= get_option( 'instagram' ); ?>" />
    <?php 
}

function custom_settings_page_setup() {
    // Contact Info
	add_settings_section( 'section', 'All Settings', null, 'theme-options' );

	add_settings_field( 'email', 'Email', 'setting_email', 'theme-options', 'section' );
	add_settings_field( 'phone', 'Phone', 'setting_phone', 'theme-options', 'section' );
	add_settings_field( 'address', 'Address', 'setting_address', 'theme-options', 'section' );

    
	register_setting('section', 'email');
	register_setting('section', 'phone');
	register_setting('section', 'address');

    // Social Media
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
	add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
	add_settings_field( 'instagram', 'Instagram URL', 'setting_instagram', 'theme-options', 'section' );

	register_setting('section', 'twitter');
	register_setting('section', 'facebook');
	register_setting('section', 'instagram');
}
add_action( 'admin_init', 'custom_settings_page_setup' );