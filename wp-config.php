<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'opposition');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         ']Csrk<T^TRW:|j`[o`.$e9PE:2|Lj[>IX9=Q~zW<`Ue*!ej8-knBv+88^xaUjm7Q');
define('SECURE_AUTH_KEY',  'yA1$8[CG;e#X!kvQj%+h vTalQ1d.FNh40A& o0X,Kvk&UQUVC+mXp7RyAW;e}#(');
define('LOGGED_IN_KEY',    '>]++?-]kd@7Dc-5#>?rGRo^$`_(S@VewJ6iIO&kpg#!u5=6hae-Yo9w!|leb2Nm|');
define('NONCE_KEY',        'H.-B$Jn@gjqo-`+ou1+-+j>+a7K(Od$TfmZw`eBU-9]lV7m|M5xP#A^[o[%{#nd=');
define('AUTH_SALT',        'w/[-b#ee0$H0AjQ?l#X[@E(1t&}$vC993a/JVN, B#LFcbeFg?ymo,_(Dqo r$6f');
define('SECURE_AUTH_SALT', 'N$ %C;|2HZxi]5+XRDBYp5-mKCCXTl-<7Vxf~pL1w8`o]gUyYzY6.xeiA-VBgk<?');
define('LOGGED_IN_SALT',   ')3*7KR`9j^lf7-Hd K~cZ^cSdFad+[Ny(0V)6cW.h?5!6,|/2yh<*N~cl<jk6Do}');
define('NONCE_SALT',       'R-N%2-gtYCP-7ky(.CoyR`bMsUXC:,dG2PL7N#GBc1^[XIw$ZG||Qz7a4W9:8J G');


$table_prefix = 'wp_';


define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);
define('SCRIPT_DEBUG', true);
define('JETPACK_DEV_DEBUG', true);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
