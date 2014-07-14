<!DOCTYPE html>
<html>
    <head>
    <title><?php //render_company_name() ?> - lavish resources</title>
    <?php
        render_dependencies();
    ?>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/themes/Lavish Resources/styles/default/uniform.css"/>
    <?php //render_plugins();?>
    </head>
    <body>
    <?php load_module_lang();
        render_lr_header();
        render_lr_menu();
        render_module_header();
        render_module_menu();
        render_module_content();
    ?>
    <footer> Copyright sympol foundation 2014</footer>
    </body>
    
</html>