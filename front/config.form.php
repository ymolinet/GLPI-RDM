<?php
include("../../../inc/includes.php");
require_once("../inc/config.class.php");

$plugin = new Plugin();
if ($plugin->isActivated("rdm")) {
   $config = new PluginRdmConfig();

   if (isset($_POST["update"])) {
      Session::checkRight("config", "w");
      $config->update($_POST);
      Html::back();

   } else {
      Html::header('Mon Plugin', $_SERVER["PHP_SELF"], "config", "plugins");
      $config->showConfigForm();
   }

} else {
   Html::header('configuration', '', "config", "plugins");
   echo "<div class='center'><br><br>".
         "<img src=\"".$CFG_GLPI["root_doc"]."/pics/warning.png\" alt='warning'><br><br>";
   echo "<b>Vous devez activer le plugin</b></div>";
   Html::footer();
}

Html::footer();
?>