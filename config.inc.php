<?php

// ************************************ DEV LOCAL PORTABLE ****************************************
define('CONTEXT', 'LOCAL');

define('ID_GoogleAnalytics', '');

define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DSN', 'mysql:host=localhost;dbname=allMaps');
define('DB_DB', 'allMaps');
define('DB_HOST', 'localhost');

define('SITE', 'http://localhost');
define('ROOT', '/allMaps');
define('ADMIN', '/ffcc/admin');
define('BOUTIQUE', '/ffcc/boutique');

define('CKCUSTOM', ROOT.'/assets/ckeditorCustom/config.min.js');

define('DATA', '/data');
define('DATA_CKFINDER', '/data/edit');
define('DATA_BOUTIQUE', '/boutique/3w/upload');

define('SERVER_IP', '::1'); // Pour autoriser les envois de mails depuis ce serveur seulement
// ************************************ DEV LOCAL PORTABLE ****************************************


// ************************************ SERVEUR PROD ****************************************
/*define('CONTEXT', 'PROD');

define('ID_GoogleAnalytics', '');

define('DB_USER', 'eiffel4e_allMaps');
define('DB_PASSWORD', 'yo.b8DFBd%hR');
define('DB_DSN', 'mysql:host=localhost;dbname=eiffel4e_allMaps');
define('DB_DB', 'eiffel4e_allMaps');
define('DB_HOST', 'localhost');

define('SITE', 'http://localhost');
define('ROOT', '/allMaps');
define('ADMIN', '/ffcc/admin');
define('BOUTIQUE', '/ffcc/boutique');

define('CKCUSTOM', ROOT.'/assets/ckeditorCustom/config.min.js');

define('DATA', '/data');
define('DATA_CKFINDER', '/data/edit');
define('DATA_BOUTIQUE', '/boutique/3w/upload');

define('SERVER_IP', '::1'); // Pour autoriser les envois de mails depuis ce serveur seulement*/
// ************************************ SERVEUR PROD ****************************************


define('TITLE', 'AllMaps');
define('META_TITLE_SUFFIXE', ' - AllMaps');
define('META_TITLE_DEFAULT', 'AllMaps - All I can find around me');
define('META_DESCRIPTION_DEFAULT', 'AllMaps - All I can find around me.');




define('FFCC_Webmaster', 'webmaster.ffcc@gmail.com');

// ****** Paramètres Google API ******
define('Google_apiKey_Navigateur', 'AIzaSyCYPIezucWZLmzYSCTXJ5IXbsbPjCFD_I4');
// ****** Paramètres Google API ******

// ****** Paramètres Bing Maps API ******
define('BingMaps_apiKey', 'AtlacP-IYeTaEvPmc_TMo2q6HliFYOzKgI_qJE7StxAvseKDl6gViy129sgfa3SS');
define('BingMaps_apiUrl', 'http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0&mkt=fr-fr,en-us');
// ****** Paramètres Bing Maps API ******

// ****** Paramètres OpenWeatherMap ******
define('OpenWeatherMap_apiKey', 'ef71edb1c4998a57a444cd168c439696');
define('OpenWeatherMap_apiUrl', 'http://api.openweathermap.org/data/2.5');
// ****** Paramètres OpenWeatherMap ******

// ****** Paramètres Active ******
define('Active_apiKey', '56ebj3dsj35zne5wbu8cv5jf');
define('Active_apiUrl', 'http://api.amp.active.com/camping/campgrounds?');
// ****** Paramètres Active ******