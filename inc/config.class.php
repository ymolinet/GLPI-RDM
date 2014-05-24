<?php

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class PluginRdmConfig  extends CommonDBTM {

	static function canCreate() {
		return plugin_rdm_haveRight('config', 'w');
	}

	static function canView() {
		return plugin_rdm_haveRight('config', 'r');
	}

	/**
	* Configuration form
	**/
	function showConfigForm() {

		$id = $this->getFromDB(1);
		echo "<form method='post' action='./config.form.php' method='post'>";
		echo "<table class='tab_cadre' cellpadding='5'>";
		echo "<tr><th colspan='4'>Configuration du plugin RDM</th></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td>Type SGBD</td>";
		echo "<td><select name='sgbd'>";
		echo "<option value='0' ".(($this->fields["sgbd"] == 0)?" selected ":"").">MySQL</option>";
		echo "<option value='1' ".(($this->fields["sgbd"] == 1)?" selected ":"").">MS-SQL</option>";
		echo "</select></td>";
		echo "<td>Base de données</td>";
		echo "<td><input type='text' name='bdd' /></td>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td>Adresse IP</td>";
		echo "<td><input type='text' name='ip' /></td>";
		echo "<td>Port</td>";
		echo "<td><input type='text' name='port' /></td>";
		echo "</tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td>Login</td>";
		echo "<td><input type='text' name='login' /></td>";
		echo "<td>Password</td>";
		echo "<td><input type='password' name='password' /></td>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'><td class='center' colspan='4'>";
		echo "<input type='hidden' name='id' value='1' class='submit'>";
		echo "<input type='submit' name='update' value='modifier' class='submit'>";
		echo "</td></tr>";
		echo "</table>";
		
		Html::closeForm();
   }
}
?>