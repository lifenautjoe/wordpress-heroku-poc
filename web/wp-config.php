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

$root_dir = __DIR__ . '/../';

require($root_dir . 'vendor/autoload.php');

$dotenv = new Dotenv\Dotenv($root_dir);
$dotenv->load();

$DB_URL = getenv("DATABASE_URL");

if ($DB_URL) {
    $DB_URL = parse_url($DB_URL);

    $DB = array(
        'host' => $DB_URL["host"],
        'username' => $DB_URL["user"],
        'password' => $DB_URL["pass"],
        'name' => substr($DB_URL["path"], 1)
    );
} else {
    $DB = array(
        'host' => getenv("DATABASE_HOST"),
        'username' => getenv("DATABASE_USERNAME"),
        'password' => getenv("DATABASE_PASSWORD"),
        'name' => getenv("DATABASE_NAME")
    );
}

$WP_AUTH_KEY = getenv("WP_AUTH_KEY");
$WP_SECURE_AUTH_KEY = getenv("WP_SECURE_AUTH_KEY");
$WP_LOGGED_IN_KEY = getenv("WP_LOGGED_IN_KEY");
$WP_NONCE_KEY = getenv("WP_NONCE_KEY");
$WP_AUTH_SALT = getenv("WP_AUTH_SALT");
$WP_SECURE_AUTH_SALT = getenv("WP_SECURE_AUTH_SALT");
$WP_LOGGED_IN_SALT = getenv("WP_LOGGED_IN_SALT");
$WP_NONCE_SALT = getenv("WP_NONCE_SALT");

$WP_DEBUG = getenv("WP_DEBUG") === "true";

//define('FORCE_SSL_ADMIN', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $DB['name']);

/** MySQL database username */
define('DB_USER', $DB['username']);

/** MySQL database password */
define('DB_PASSWORD', $DB['password']);

/** MySQL hostname */
define('DB_HOST', $DB['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', $WP_AUTH_KEY);
define('SECURE_AUTH_KEY', $WP_SECURE_AUTH_KEY);
define('LOGGED_IN_KEY', $WP_LOGGED_IN_KEY);
define('NONCE_KEY', $WP_NONCE_KEY);
define('AUTH_SALT', $WP_AUTH_SALT);
define('SECURE_AUTH_SALT', $WP_SECURE_AUTH_SALT);
define('LOGGED_IN_SALT', $WP_LOGGED_IN_SALT);
define('NONCE_SALT', $WP_NONCE_SALT);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_lifenautjoe_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', $WP_DEBUG);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
