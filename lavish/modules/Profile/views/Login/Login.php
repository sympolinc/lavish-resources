<?php
    if(!is_null($_POST["user_name"]) && !is_null($_POST["password"])):
        //  enter validation data here and set the user's id number as the value to LR_USER_LOGIN_COOKIE
        redirect("/");
    endif;
    ?>
    <style>
        .lr-center.lr-col-6{
            position:relative;
            z-index:11;
        }
        .lr-profile-form {
            margin-left:auto;
            margin-right:auto;
            max-width: 500px;
            background: #F7F7F7;
            padding: 25px 15px 25px 10px;
            color: #888;
        }
        .lr-profile-form label {
            display: block;
            margin: 0px;
            margin-bottom:10px;
        }
        .lr-profile-form label>span {
            float: left;
            width: 20%;
            text-align: right;
            padding-right: 10px;
            color: #888;
            vertical-align: middle;
            display: inline-block;
            padding: 7px 10px;
        }
        .overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background-color: rgba(0,0,0,0.5); /*dim the background*/
        }
        
    </style>
    <div class="overlay">
    
    </div>
    <div class="lr-center lr-col-6">
        <div class="k-block">
            <div class="k-header">Login</div>
            <form action="" method="post" class="lr-profile-form" id="lr-profile-login-form">
                <label>
                    <span>Username</span>
                    <input id="user_name" class="k-textbox" type="text" name="user_name" placeholder="Your Username" />
                </label>  
                <label>
                    <span>Password</span>
                    <input id="password" class="k-textbox" type="text" name="password" placeholder="Your Password" />
                </label>  
                <label>
                    <span>&nbsp;</span>
                    <input id="persist_login" class="k-checkbox" type="checkbox" name="persist_login"/>
                    <label>Remember Me</label>
                </label>  
                 <label>
                    <span>&nbsp;</span> 
                    <button type="submit" class="k-button" id="lr-profile-login-submit"/> Login </button>
                </label>    
            </form>
        </div>
    </div>
    <script type='text/javascript'>
        $('#lr-profile-login-form').submit(function(){
            if($('#user_name').val() && $('#password').val()) {
                return true;
            }
            return false;
        });
    </script>