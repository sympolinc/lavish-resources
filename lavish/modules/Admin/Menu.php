<?php
//  format=location, label, title
global $g_mod_lang;
$g_module_menu=array();
$g_module_menu[]=array(
    "?module=Admin&view=Main",
    $g_mod_lang["LBL_ADMIN_HOME"],
    "Main"
);
$g_module_menu[]=array(
    "?module=Admin&view=ModuleManager",
    $g_mod_lang["LBL_MODULE_MANAGER"],
    "ModuleManager"
);
$g_module_menu[]=array(
    "?module=Admin&view=UserManager",
    $g_mod_lang["LBL_USER_MANAGER"],
    "UserManager"
);