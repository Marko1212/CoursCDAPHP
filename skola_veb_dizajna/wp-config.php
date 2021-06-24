<?php
/**
 * Основне поставке Вордпреса.
 *
 * Ова датотека се користи од стране скрипте за прављење wp-config.php током
 * инсталирања. Не морате да користите веб место, само умножите ову датотеку
 * у "wp-config.php" и попуните вредности.
 *
 * Ова датотека садржи следеће поставке:
 * * MySQL подешавања
 * * тајне кључеве
 * * префикс табеле
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL подешавања - Можете добити ове податке од свог домаћина ** //
/** Име базе података за Вордпрес */
define( 'DB_NAME', 'skola_veb_dizajna' );

/** Корисничко име MySQL базе */
define( 'DB_USER', 'root' );

/** Лозинка MySQL базе */
define( 'DB_PASSWORD', '' );

/** MySQL домаћин */
define( 'DB_HOST', 'localhost' );

/** Скуп знакова за коришћење у прављењу табела базе. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Не мењајте ово ако сте у сумњи. */
define( 'DB_COLLATE', '' );


define('WP_CACHE', false);

/**#@+
 * Јединствени кључеви за аутентификацију.
 *
 * Промените ово у различите јединствене изразе!
 * Можете направити ово користећи {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org услугу тајних кључева}
 * Ово можете променити у сваком тренутку да бисте поништили све постојеће колачиће.
 * Ово ће натерати кориснике да се поново пријаве.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/qnyFJsx|GXiG4wGhR2c<(giY9Ba3*-(+&:<>buR|mYrb.<>8|F`@0c=Y6^cIUy/');
define('SECURE_AUTH_KEY',  'LwlNhJ|euCJ}PQ_/{c&BZmYj(LyYknj4J_HG+QmXetL@z}tQ92rn($-Ci5 rn3L@');
define('LOGGED_IN_KEY',    'Z!H-ED+2nDY#iKc$MfQJ?Np<@OVUwcLMgkN)CYi$4xv)bfl)l@Af>W[V_{!Gq9Hn');
define('NONCE_KEY',        'oi|r/ZU5irkIv6BPM{0RKK8tdF?1v+ZGJYx W-(@(3^6@LB*-h]aHaD[99JrxxH@');
define('AUTH_SALT',        ';NY_M8mDq$S,Kxsf{vArP^hT^tOYK)n?)y/QZBZLNj>Fu1d!7-vR.aK]kWw=QRbC');
define('SECURE_AUTH_SALT', '4e#Jh=t0vk3gmEk+]h&UM+[J*F,Yz9nBEGw3^YZ>`8#!r9jCz.TH>_RBhlF|-DZ ');
define('LOGGED_IN_SALT',   '#k7L0^snx ;m^jut`KVB8T_}--z,>/Q1-24a&%9qGjz $k(v iKq$Gx{919b^v+9');
define('NONCE_SALT',       'BA&+*Ry#r|W#aVy:-jIzbp@OJLq1!P,tbP_em*Dbu.ZotM;N]]_{c$MXDHD:i|v2');

/**#@-*/

/**
 * Префикс табеле Вордпресове базе података.
 *
 * Можете имати више инсталација Вордпреса у једној бази уколико
 * свакој дате јединствени префикс. Само бројеви, слова и доње цртице!
 */
$table_prefix = 'svd_';

/**
 * За градитеље: исправљање грешака у Вордпресу ("WordPress debugging mode").
 *
 * Промените ово у true да бисте омогућили приказ напомена током градње.
 * Веома се препоручује да градитељи тема и додатака користе WP_DEBUG
 * у својим градитељским окружењима.
 *
 * За више података о осталим константама које могу да се
 * користе током отклањања грешака, посетите Документацију.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* То је све, престаните са уређивањем! Срећно објављивање. */

/** Апсолутна путања ка Вордпресовом директоријуму. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Поставља Вордпресове променљиве и укључене датотеке. */
require_once( ABSPATH . 'wp-settings.php' );
