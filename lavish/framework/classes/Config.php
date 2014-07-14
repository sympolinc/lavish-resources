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
 * Description of core
 *
 * @author sympol foundation
 */
req("Database");
class Config {
    /**
     * The table associated with the class
     * @var string
     */
    /**
     * Get a setting from the configuration table (tbl_config) and return the value.
     * @param string $settingName The name of the configuration key to retrieve.
     * @param string [$module=ALL] The module the key is defined to. Defaults to Global.
     * @param string [$comp=0] The component id of the component the key is defined to. Defaults to Global.
     * @return int|string|bool|null The value of the configuration key, or if not found null.
     */
    public static function getSetting($settingName,$module='*',$comp=0){
        $connect= mysqli_connect(LR_DB_HOST, LR_DB_UN, LR_DB_PW, LR_DB_DB,LR_DB_PORT);
        if(mysqli_connect_errno()){
            return;
        }
        $db=new Database($connect);
        return $db->query_scalar("SELECT * FROM " . LR_DB_TBL_CONFIG . " WHERE key_name='$settingName' and module='$module' and comp_id=$comp","key_value");

    }
    /**
     * Set a setting in the configuration table (tbl_config).
     * @param string $settingName The name of the configuration key to set.
     * @param string $settingValue The value to set the configuration key to.
     * @param string [$module=ALL] The module to define the key in. Defaults to Global.
     * @param int [$comp=0] The component id of the component to define the key in. Defaults to Global.
     * @return int The number or rows affected
     */
    public static  function setSetting($settingName,$settingValue,$module='*',$comp=0){
        $connect= mysqli_connect(LR_DB_HOST, LR_DB_UN, LR_DB_PW, LR_DB_DB,LR_DB_PORT);
        if(mysqli_connect_errno()){
            return;
        }
        $db=new Database($connect);
        if($this->defined($settingName,$module,$comp,$type='string')):
            $sql="UPDATE " . LR_DB_TBL_CONFIG . " SET key_value='$settingValue' WHERE key_name='$settingName' and module='$module' and comp_id=$comp"; 
        else :
            $sql="INSERT INTO " . LR_DB_TBL_CONFIG . " (comp_id, module,key_name, key_value,key_type, sys)values($comp,'$module',$settingName', '$settingValue','$type',0)";
        endif;
        return count($db->exec($sql));
    }
    /**
     * Determines whether a setting exists in the configuration table(tbl_config);
     * @param string $settingName The name of the setting to check.
     * @param string [$module=ALL] The module to check for the key in. Defaults to Global.
     * @param int [$comp=0] The omponent id of the component to check for the key in. Defaults to Global.
     * @return bool
     */
    public static function defined($settingName,$module='*',$comp=0){
        return !is_null($this->getSetting($settingName,$module,$comp));
    }
}
