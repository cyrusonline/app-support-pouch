<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getTest extends portal_action {
	
	function execute() {
		global $db,$CFG;
		
		//$db->Execute($SQL);


	}

}
?>