<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
if(file_exists('config.php')):
    require_once('config.php');
else :
    die('Unable to initialize the lr application without a configuration file (config.php)');
endif;
if(file_exists('settings.php')):
    require_once('settings.php');
else :
    die('Unable to initialize the lr application without a settings file (settings.php)');
endif;
require_once('framework/init.php');
req('Config');
global $g_current_module;
global $g_current_view;
global $g_current_lang;
$g_current_lang=isset($_GET["lang"]) &&$_GET["lang"]!==null?$_GET["lang"]:Config::getSetting('G_DEFAULT_LANG');
$g_current_module=isset($_GET["module"]) &&$_GET["module"]!==null? $_GET["module"]:Config::getSetting('G_DEFAULT_MODULE');
$g_current_view=isset($_GET["view"]) &&$_GET["view"]!==null ? $_GET["view"]:"Main";
global $g_mod_lang;
define('LR_G_DEFAULT_THEME',Config::getSetting('G_DEFAULT_THEME'));
if(is_null($_GET["module"])):
    header("Location: /?module=$g_current_module&view=$g_current_view");
endif;
include_once LR_THEMES . LR_G_DEFAULT_THEME . "/index.php";