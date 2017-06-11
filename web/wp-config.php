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


$root_dir = __DIR__. '/../';

require($root_dir . 'vendor/autoload.php');

$dotenv = new Dotenv\Dotenv($root_dir);
$dotenv->load();

$DB_URL = getenv("DATABASE_URL");

if($DB_URL){
    $DB = array(
        'host' => $DB_URL["host"],
        'username' => $DB_URL["user"],
        'password' => $DB_URL["pass"],
        'name' => substr($DB_URL["path"], 1)
    );
} else{
    $DB = array(
        'host' => getenv("DATABASE_HOST"),
        'username' => getenv("DATABASE_USERNAME"),
        'password' => getenv("DATABASE_PASSWORD"),
        'name' => getenv("DATABASE_NAME")
    );
}


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
define('AUTH_KEY',         ':,?$6CFc/}<I85UxyaMy(:[Z|meu fOX-Q7CS<twUM|mtkRR0&>06_@utjFN#yH-');
define('SECURE_AUTH_KEY',  'Y53h|#{/X^/vUY@A(YjY+ :QY1YmJ&M<s|jep|w:Y_$Ksfj?-B8tf+WY(M(j-KU/');
define('LOGGED_IN_KEY',    'C,P:;eg-H<<gW<=HVW*Bw~g>)I$@x>%3*k(0v$b@u.^*Ab_Ge(WyV{ ?*w{!6Z`L');
define('NONCE_KEY',        'D>X%A,( UnYI|![}Yjx~z9wjQAmMMJ+UC2i?`$=|W6$kDKc?#=j9xsQanR#<JG|<');
define('AUTH_SALT',        'C^~uVt[+<CqxKCi9I{Hxy:be5#=JZk>hpc)~Cx78T@ EFJa{?83647-+>GZvW{A`');
define('SECURE_AUTH_SALT', 'cEsC<6Rr%}%+T1jdznf<mbgQ*sDrFKJ,bAE:35;>&rqOPd+]EFj!~T$%9,Q@JCk`');
define('LOGGED_IN_SALT',   'j-SZ3T^^MK0:WtzRiK-F!c9>Hf*{MT|NM6AJkB E7NijF7Byxi(_`/b+mJ98F#:G');
define('NONCE_SALT',       '^TJ&|usW,L<RwQ--|4Q0!ZB$Bo`Z~MgqJa/JoFnK3u4A8b F_!l;$6Q+;oJ]2*9l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_lifenautjoe_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
