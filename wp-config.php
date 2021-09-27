<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ba4mWVFd5tiu2qcez3IKVFtqLN3oUJiF7IlcEWP7hY0HlnEx8v2cYVnFzQJEtsU1' );
define( 'SECURE_AUTH_KEY',  'u2z1Bo6Zepnn9q6AZPkJKesgZYUP4saPxmkXqRZ7VFb6M4QiABS6A2RyBqU4n3jv' );
define( 'LOGGED_IN_KEY',    'fXVn6dkYqwowpuMIiiZ4W4RGcHJQ3x2WxgEq6SFVwUQbHYfTbp5qNAW5deWeVBKH' );
define( 'NONCE_KEY',        '8cE3aCXMQgY5KqplooRRHnCx6YFbPqxXb8MXlE7e9BzziWbYwBQFEBM1PKrze5Jo' );
define( 'AUTH_SALT',        '3hILEFpOjFXcRzgAXUh3CAXf9no75wJHfs81ZmKFLDPwjGYaNEhopYjiFIyHdf8I' );
define( 'SECURE_AUTH_SALT', 'c6nyQjA1CjeequWKXHxQ6HGAcBjHXcYD4K8d7IiNypBCkuRZARoiPsp6bOhICujh' );
define( 'LOGGED_IN_SALT',   'zCzki5GbTy7i6Vjmhigzc1R9L4Ki1kafjmv1FwP3cOF0AHNZWEy9ghgHHgHHTwt3' );
define( 'NONCE_SALT',       'aW9BymHQwoIx0TjkKKQSlq0GtsDXdS3Wsnjp1TI8SHoFLgSPQofj6DWMWJsdYBmb' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
