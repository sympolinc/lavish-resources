<?php

/* 
 * The MIT License
 *
 * Copyright 2014 sympol foundation.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * @param string $class The name of the class, more specifically the name of the file the class is included in, to load. If best practices are followed, it is assumed they are the same.
 * @returns undefined
 * */
function req($class){
    exists_include(LR_FWK . "classes/$class.php") ;
}
/**
 * Render and inject lr's top level menu.
 * @param string [$direction=horizontal] The direction of the menu. Either 'vertical' or 'horizontal'. Default is 'horizontal';
 * @returns undefined
 * */
 function render_dependencies(){
     $deps='<link rel="stylesheet" href="/assets/normalize/normalize.css" />
            <link rel="stylesheet" href="/assets/kendo/styles/kendo.common.min.css" />
            <link rel="stylesheet" href="/assets/kendo/styles/kendo.uniform.min.css" />
            <script src="/assets/jquery/jquery.min.js"></script>
            <script src="/assets/kendo/js/kendo.all.min.js"></script>';
    echo $deps;
 }
 // renders the company name and logo
 function render_lr_header(){
    echo "<h2 style='margin:0;' class='k-header'>sympol foundation lavish resources</h2>";
 }
function render_lr_menu($direction='horizontal'){
    //  for now just render the menu
    //  only admins can modify this menu
    $menu='<ul id="lr-app-nav"></ul>';
    global $g_current_lang;
    req('Config');
    $defaultMenu=json_decode(Config::getSetting('G_DEFAULT_LR_MENU'));
    $menuObject=array();
    foreach($defaultMenu as $menuItem):
        $get_file=LR_MOD . "$menuItem/$menuItem.json";
        if(f_exists($get_file)):  
            $json=file_get_contents($get_file);
            $menuObject[]=json_decode($json)->topMenu->$g_current_lang;
        endif;
    endforeach;
    $script='<script type="text/javascript">$(\'#lr-app-nav\').kendoMenu({dataSource:' . json_encode($menuObject) . ',orientation:"' . $direction . '"});</script>';
    echo $menu;
    echo $script;
}
/**
 * Render and inject the current module's menu
 * @param string [$direction=horizontal] The direction of the menu. Either 'vertical' or 'horizontal'. Default is 'horizontal';
 * @returns undefined
 * */
 function load_module_lang(){
    global $g_current_module;
    global $g_current_lang;
    exists_require(LR_MOD . "$g_current_module/lang/$g_current_lang.php");
 }
 // Renders the views name
 function render_module_header(){
    global $g_current_module;
    echo "<h4 style='margin:0;' class='k-header'>$g_current_module</h4>";
 }
function render_module_menu($direction='horizontal'){
    global $g_current_module;
    global $g_module_menu;
    global $g_current_view;
    $get_file=LR_MOD . "$g_current_module/Menu.php";
    if(f_exists($get_file)):  
        require_once($get_file);
    endif;
    if(!count($g_module_menu)):
        $g_module_menu=array();
    endif;
    $menu='<ul id="lr-mod-nav">';
    $items=array();
    foreach($g_module_menu as $menuItem):
        $is_active='';
        if($menuItem[2] && $g_current_view===$menuItem[2]):
            $is_active='k-state-active';
        endif;
        $items[]='<li class="' . $is_active . '"><a href="' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
    endforeach;
    $menu.=implode($items) . "</ul>";
    if(count($items)):
        $script='<script type="text/javascript">$(\'#lr-mod-nav\').kendoMenu({orientation:"' . $direction . '"});</script>';
        echo $menu;
        echo $script;
    endif;
}
/**
 * Render and inject the current view's ribbon.
 * @returns undefined
 * */
 
function render_view_ribbon(){
    
}
/**
 * Render and inject the widgets in the dashboard.
 * @param array $widgets The widgetArray to present in the dashboard
 * @returns undefined
 * */
function render_lr_widgets($widgets){
    
}
/**
 * Render and inject module widgets.
 * @param array $widgets The widgetArray to present in the module
 * @returns undefined
 * */
function render_module_widgets(){
    
}
function exists_include($path){
    if(!@include_once $path):
        die("$path was not found!");
    endif;
}
function exists_require($path){
    if(!@require_once $path):
        die("$path was not found!");
    endif;
}
function f_exists($path){
    $file_headers = @get_headers($path);
    if($file_headers[0] === 'HTTP/1.1 404 Not Found') {
        return false;
    }
    return true;
}
function render_module_content(){
    global $g_current_module;
    global $g_current_view;
    exists_require( LR_MOD . "$g_current_module/$g_current_module.php");
    exists_require( LR_MOD . "$g_current_module/functions.php" );
    exists_include( LR_MOD . "$g_current_module/views/$g_current_view/$g_current_view.php");
}
function redirect($url){
    echo '<script type="text/javascript" id="lr-redirect">$(document).ready(function(){window.location="' . $url . '";});</script>';
}
function default_connection(){
     $connect= mysqli_connect(LR_DB_HOST, LR_DB_UN, LR_DB_PW, LR_DB_DB,LR_DB_PORT);
     if(mysqli_connect_error()):
         echo mysqli_connect_errno();
         return false;
    else:
        return $connect;
     endif;
}
