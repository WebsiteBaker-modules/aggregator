<?php

/*
Copyright (C) 2007, Pixel Media Pty. Ltd. 
http://www.pixelmedia.com.au
admin@pixelmedia.com.au

This module is free software. 
You can redistribute it and/or modify it 
under the terms of the GNU General Public License
 - version 2 or later, as published by the Free Software Foundation: 
http://www.gnu.org/licenses/gpl.html.

This module is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details.
*/


require('../../config.php');
//require(WB_PATH.'/framework/class.database.php');  //only required for WB 2.5.x
require_once(WB_PATH.'/framework/functions.php');

$database = new database(DB_URL);

//only add the fields if the database does not already have them:
$query = "DESCRIBE " . TABLE_PREFIX . "mod_aggregator aggregate_hidden";
$db_check = $database->query($query);
if(!$db_check->numRows()){
	//Adding the new fields to the mod_aggregator table:
	echo "<p><strong>Adding new fields to database table mod_aggregator...</strong></p>";
	if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_aggregator` ADD `aggregate_hidden` BOOL NOT NULL DEFAULT '0' AFTER `page_id`")) {
		echo "<p>Database Field aggregate_hidden added successfully</p>";
	}
	echo mysql_error() . "<br />";
	
	if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_aggregator` ADD `remove_summary_html` BOOL NOT NULL DEFAULT '1' AFTER `summary_class`")) {
		echo "<p>Database Field remove_summary_html added successfully</p>";
	}
	echo mysql_error() . "<br />";

	//Adding default values to existing aggregator records:
	$existing_records = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_aggregator");
	while($result = $existing_records->fetchRow()) {
	  $section_id = $result['section_id'];
	  echo "<p>Adding default aggregate_hidden settings for aggregator section_id= " . $section_id . ".</p>";
	  if($database->query("UPDATE `".TABLE_PREFIX."mod_aggregator` SET `aggregate_hidden` = '0' WHERE `section_id` = $section_id")) {
	    echo '<p>aggregate_hidden settings added successfully.</p>';
	  }
	  echo mysql_error().'<br />';

	  echo "<p>Adding default remove_summary_html settings for aggregator section_id= " . $section_id . ".</p>";
	  if($database->query("UPDATE `".TABLE_PREFIX."mod_aggregator` SET `remove_summary_html` = '1' WHERE `section_id` = $section_id")) {
	    echo '<p>remove_summary_html settings added successfully.</p>';
	  }
	  echo mysql_error().'<br />';
	}

	echo "<p><strong>UPDATE COMPLETED</strong></p>";
}


//remove old columns from existing table, if present:
$query = "DESCRIBE " . TABLE_PREFIX . "mod_aggregator item_h_spacing";
$db_check = $database->query($query);
if($db_check->numRows()){
	//Removing the old fields from the mod_aggregator table:
	echo "<p><strong>Removing field 'item_h_spacing' from database table mod_aggregator...</strong></p>";
	if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_aggregator` DROP COLUMN `item_h_spacing`")) {
		echo "<p>Database Field item_h_spacing removed successfully</p>";
	}
	echo mysql_error() . "<br />";
	
	echo "<p><strong>Removing field 'item_v_spacing' from database table mod_aggregator...</strong></p>";
	if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_aggregator` DROP COLUMN `item_v_spacing`")) {
		echo "<p>Database Field item_v_spacing removed successfully</p>";
	}
	echo mysql_error() . "<br />";
		
	echo "<p><strong>Removing field 'summary_id' from database table mod_aggregator...</strong></p>";
	if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_aggregator` DROP COLUMN `summary_id`")) {
		echo "<p>Database Field summary_id removed successfully</p>";
	}
	echo mysql_error() . "<br />";
	
}

?>