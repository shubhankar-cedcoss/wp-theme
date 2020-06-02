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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Fi1v3Js4lIIsdXKoVQ9OYdKJgDT3Vup5m1OMteKcFoLuxYsfR0U3EmXfyWN7rpn3RqlQtJT1cvewF3jtY4Wmqg==');
define('SECURE_AUTH_KEY',  'LFc6wZ9DdDd+EH6+xQrVrw8mcTwbLe+Q1GMJHR9KT7TQxjqxbcBifiDzdaTnLCPH8lMMj4gu9R+w2BoSk2TLkQ==');
define('LOGGED_IN_KEY',    'HjqoLGfS6DRecp5pNcMNLCSaD6iYz5dPWP1O1SMANiT8yfuQV+f5ri4+7AN1iDV7TQ5nAqy6me6JByUAzi9ssA==');
define('NONCE_KEY',        'qE509hmIkGKb7+DxddihBUjNVfwwM623XPlEZeon6zN3MG6cn5Ukgx4BAeD+KX14PPxj2iW9n0HzuVafrtX2jA==');
define('AUTH_SALT',        'EpkPEk2ekdFbY18KyU8siZGWOgPAWFSqOQ7kp0MojBvQzNWfKgHw6ftcnvmOJYh8ykOpSvcDQeuZb667N+FRbA==');
define('SECURE_AUTH_SALT', 'COpGc0PC27nipfB6i4u86tQltvo8KWGoqHXOyjcQmVMWpoDnxTGxkOdLfZ8PZUupWwSUgazrH1kHEJGC15dORQ==');
define('LOGGED_IN_SALT',   'IGet3teTx7S+OLTUykWmN1JC9yRHNV7O4dn4iZ1Skj4b83dwtC+UCRGugPOVNASbB9Niz4utkoYHxM3ZeNIWPw==');
define('NONCE_SALT',       '0zFw39+DVqeXGZqXQjwlAOpdDCbd5OJ0TBWfqWo9qyQNglUMoYsW7xHTylMEaJulKadeVOvrLZ1/PuZ0bJcvdA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
