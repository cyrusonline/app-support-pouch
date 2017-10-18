<?php

require_once("../init.php");

$myApp = portal_app::getApp("app-support-pouch");
$myApp->doAction($_REQUEST['action_id']);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="Cache-control" content="private">
    <title>HSMC u-Support</title>
    <!-- Path to Framework7 Library CSS-->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot_lib ?>/framework7/css/framework7.ios.min.css">
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot_lib ?>/framework7/css/framework7.ios.colors.min.css">
  <link rel="stylesheet" href="<?php echo $CFG->wwwroot_lib ?>/framework7/css/framework7-icons.css">

      <link rel="stylesheet" href="<?php echo $CFG->wwwroot_lib ?>/framework7/css/framework7-icons.css">
    <!-- Path to your custom app styles-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.min.js"></script> -->
    <script src="https://unpkg.com/vue" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue2-filters/0.1.9/vue2-filters.min.js"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/3.0.4/fuse.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/vee-validate@2.0.0-rc.7" charset="utf-8"></script>
    <script src="//cdn.jsdelivr.net/npm/pouchdb@6.3.4/dist/pouchdb.min.js"></script>
    <script type="text/javascript" src="<?php echo $CFG->wwwroot_lib ?>/portal/portal_js.php"></script>
    <script src="js/filereader.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/my-app.css">

    <script>
         Vue.use(VeeValidate);
       </script>

  </head>
  <body>
    <!-- Status bar overlay for fullscreen mode-->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-cover layout-dark">
      <?php include 'left_right_panel.php' ?>
    <!-- Views-->
    <div class="views" >
      <!-- Your main view, should have "view-main" class-->
      <div class="view view-main" id="app">
        <!-- navbar -->
      <?php include 'navbars.php' ?>
        <!-- Pages, because we need fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">

       <!-- home page -->
           <?php include 'home.php' ?>

                   <!-- Any support page -->
               

                  <!-- Progress page -->
             










        </div>

      </div>
    </div>
    <!-- Path to Framework7 Library JS-->
    <script src="js/component_location_input.js"></script>
    <script src="js/component_searchbar.js"></script>
    <script src="js/component_roomcontact.js"></script>
    <script src="js/component_contactgroup.js"></script>
    <script src="js/component_contact.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="js/my-app.js"></script>

  </body>
</html>
