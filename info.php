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

 -------------------------------------------------------------------------------------------------
  Aggregator Module for Website Baker v2.6.x
  Module to automatically generate a 'list' or 'catalogue' of its child pages. 
  The user can specify what information of the child pages should be displayed in the list. 
  Licencsed under GNU, copyright Pixel Media Pty. Ltd, written by Igor de Oliveira Couto (icouto)
 -------------------------------------------------------------------------------------------------
   v1.00  (Igor de Oliveira Couto; 12.05.2007)
    + initial release of the aggregator module

   v1.10  (Christian Sommer; 13.05.2007)
    + added German language file to the module

   v1.20  (Matthias Gallas; 15.05.2007)
    + stored all Files in UNIX /ANSI
    + fixed some missing php tags

   v1.3  (Igor Couto; 18.05.2007)
	+ added ability to aggregate pages with visibility set to 'hidden'
	+ added ability to remove html markup from extracted page summary
	+ simplified layout of aggregator preferences/settings
	+ 'prettified' html output
	+ added 'update.php' script - for users of versions 1.1 and 1.2
	+ added very basic built-in help (to be amplified and translated to other languages)
	
   v1.3.1  (Igor Couto; 20.05.2007)
	+ changed 'update.php' to 'upgrade.php' - now WB upgrades automatically, if needed
	+ added new version of German translation - thank you Christian and Matthias
	
   v1.3.2  (Igor Couto; 22.05.2007)
	+ trapped infinite loop error triggered when aggregating other aggregators
	+ trapped badly-defined regex error in include.php (changed delimiter from / to #)
	+ changed default setting values for new aggregators
	
   v1.3.3  (Igor Couto; 24.05.2007)
	+ fixed variable scope issue causing 'division by 0' errors when including other modules
	+ changed upgrade.php script to detect whether database upgrade is needed

   v1.4  (Igor Couto; 25.05.2007)
	+ changed the aggregator list from a table- to a div-based layout
	+ removed item_v_spacing, item_h_spacing columns from database - no longer needed, due to div layout
	+ removed summary_id column from database - no user uses this feature
	+ removed all code from several files that referenced the columns removed, or used their data
	+ updated the upgrade.php script
	+ updated help file accordingly
	
 -----------------------------------------------------------------------------------------
*/

$module_directory = 'aggregator';
$module_name = 'Aggregator';
$module_function = 'page';
$module_version = '1.4';
$module_platform = '2.6.x';
$module_author = 'Igor de Oliveira Couto | <a href="http://www.pixelmedia.com.au">Pixel Media Pty. Ltd.</a><br />with many thanks to Christian Sommer and Matthias Gallas for their corrections, tips, suggestions and translations.';
$module_license = 'GNU General Public License';
$module_description = '<p>The Aggregator builds a customisable, automatic <strong>summary</strong> of all child pages below it. <br />The child pages can be of any type, even other Aggregators.</p><p>Aggregators have a variety of applications: use them to build your own image galleries, blogs, lists, catalogs, and more!';


?>