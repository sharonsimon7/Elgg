<?php

	/**
	 * Elgg install script
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	/**
	 * Start the Elgg engine
	 */
		require_once(dirname(__FILE__) . "/engine/start.php");
		global $CONFIG;
		
	/**
	 * If we're installed, go back to the homepage
	 */
		if (is_installed() && is_db_installed())
			forward("index.php");
		
	/**
	 * Install the database
	 */
		if (!is_db_installed()) {
			run_sql_script(dirname(__FILE__) . "/engine/schema/mysql.sql");
			system_message("The Elgg database was installed.");
		}
		
	/**
	 * Load the front page
	 */
		echo page_draw("Installation", elgg_view("settings/system"));

?>