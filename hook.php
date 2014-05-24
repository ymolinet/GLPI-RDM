<?php

function plugin_rdm_install() {
	global $DB;

	$migration = new Migration(100);

	// =======
	// Debut Table PROFILES
	// =======
	// Création de la table uniquement lors de la première installation
	if (!TableExists("glpi_plugin_rdm_profiles")) {
		// requete de création de la table    
		$query = "CREATE TABLE `glpi_plugin_rdm_profiles` (
			`id` int(11) NOT NULL default '0' COMMENT 'RELATION to glpi_profiles (id)',
			`right` char(1) collate utf8_unicode_ci default NULL,
			PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

		$DB->queryOrDie($query, $DB->error());

		$migration->executeMigration();

		//creation du premier accès nécessaire lors de l'installation du plugin
		include_once(GLPI_ROOT."/plugins/rdm/inc/profile.class.php");
		PluginRDMProfile::createAdminAccess($_SESSION['glpiactiveprofile']['id']);
	}
	// =======
	// Fin Table PROFILES
	// =======

	// =======
	// Debut Table DropDown SGDB
	// =======
	if (!TableExists("glpi_plugin_rdm_sgbd")) {
		$query = "CREATE TABLE `glpi_plugin_rdm_sgbd` (
                  `id` int(11) NOT NULL auto_increment,
				  `sgdb` varchar(255) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

		$DB->queryOrDie($query, "erreur lors de la création de la table de configuration ".$DB->error());
	}
	// =======
	// Fin Table DropDown SGDB
	// =======
	
	// =======
	// Debut Table CONFIG
	// =======
	if (!TableExists("glpi_plugin_rdm_configs")) {
		// requete de création de la table pour la configuration
		$query = "CREATE TABLE `glpi_plugin_rdm_configs` (
                  `id` int(11) NOT NULL auto_increment,
                  `ip` varchar(255) NOT NULL,
				  `port` varchar(255) NOT NULL,
				  `login` varchar(255) NOT NULL,
				  `password` varchar(255) NOT NULL,
				  `db` varchar(255) NOT NULL,
				  `sgdb_id` int(1) NOT NULL, 
                  PRIMARY KEY (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

		$DB->queryOrDie($query, "erreur lors de la création de la table de configuration ".$DB->error());
	}
	// =======
	// Fin Table CONFIG
	// =======
	
	// se fait toujours à la fin pour grouper les migration par table
	$migration->executeMigration();

    return true;
}

function plugin_rdm_uninstall() {
	global $DB;

	$tables = array("glpi_plugin_rdm_profiles");

	foreach($tables as $table) {
		$DB->query("DROP TABLE IF EXISTS `$table`;");
	}
    return true;
}

?>