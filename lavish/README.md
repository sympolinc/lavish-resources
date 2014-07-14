lr is the sympol foundation's Enterprise Resource Planning software or ERP. The software is highly extensible and allows for installation of plugins, modules, views, widgets, themes, and dashlets.

So what's the difference between these "installable items"?

Well, has its own function and some are part of another "installable item".

Modules are the largest item of the lr structure. These are essentially individual software packages wrapped within the lr application. Some shared data with and rely on other modules to function.

Views are the second largest and are essentially parts of a module. A view is really a display of data, such as a form or table.

Themes are where the lr software gets its duds. The colors and font are managed here. Eventual development is planned to lead to changing the structure of the software.

Plugins are very small applets that modify how data is handled and stored. These are client-side utilities.

Widgets and dashlets are essentially the same thing, with the exception that widget do not perform CRUD operations with the data. Dashlets are small views of data that can appear anywhere in the software that display or modify data from other modules. Widgets are utilities that assist in other operations. An example of a dashlet is CommDash, a dashlet that displays recent calls and allows for quick documentation of inbound and outbound calls. An example of a widget is a clock or a Google search feature. Because neither of these perform CRUD operation they are considered widgets.

The structure and layout, as well as the requirements of each differ across each "installable item". Let's take a look at those...

Modules
  - Menu.php                //  The ribbon information
  - views                   //  Views within the module
      - main.php            //  The main view
  - lang                    //  Contains the languages for the module
      - lang.en-us.php      //  not required but highly suggested
  - {Name}.json             //  The information file
  - {Name}.php              //  the class for the module

Dashlets
  - dashlet.php              //  The executable file for the dashlet
  - Menu.php                //  the menu items to add to the toolbar
  - {name}.json             //  the information file.
  
Views

  