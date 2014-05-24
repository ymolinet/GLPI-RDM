<?php

// https://forge.indepnet.net/projects/plugins/wiki/Fr_CreatePlugin084

// la version de votre plugin et sa compatibilité
function plugin_version_rdm() {

   return array('name'           => "RDM",
                'version'        => '1.0.0',
                'author'         => 'Yannick MOLINET',
                'license'        => 'GPLv2+',
                'homepage'       => 'https://forge.indepnet.net/repositories/show/rdm',
                'minGlpiVersion' => '0.84');// For compatibility / no install in version < 0.80

}

// le blocage à une version spécifique de GLPI.
function plugin_rdm_check_prerequisites() {

   if (version_compare(GLPI_VERSION,'0.84','lt') || version_compare(GLPI_VERSION,'0.85','gt')) {
      echo "This plugin requires GLPI >= 0.84 and GLPI < 0.85";
      return false;
   }
   return true;
}

// le controle de la configuration
function plugin_rdm_check_config($verbose=false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
     echo 'Installed / not configured';
   }
   return false;
}

// Initialisation du plugin
function plugin_init_rdm() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['rdm'] = true;
   $PLUGIN_HOOKS['change_profile']['rdm'] = array('PluginRdmProfile','changeProfile');
   Plugin::registerClass('PluginRdmProfile', array('addtabon' => array('Profile')));
   
   if (Session::haveRight("config", "w")) {
      $PLUGIN_HOOKS['config_page']['rdm'] = 'front/config.form.php';
   }
}
?>