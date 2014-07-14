<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!is_null($_GET["action"])):
    $action=$_GET["action"];
else:
    $action="ListUsers";    
endif;
global $g_current_module;
global $g_module_menu;
global $g_current_view;
exists_include(LR_MOD . "/$g_current_module/views/$g_current_view/actions/$action.php") ;