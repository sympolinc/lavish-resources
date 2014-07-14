<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id=$_GET["_id"];
if(!$id):
    redirect("?module=Admin&view=UserManager&action=NewUser");
endif;
req("SympolDbInfo");
$info=new SympolDbInfo(default_connection());

