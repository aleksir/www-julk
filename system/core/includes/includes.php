<?php
defined( 'SYS_PATH' ) or die( "[".__FILE__."] ROOT_PATH not defined");

//include('functions.inc');
require_once(SYS_PATH.'/core/classes/sees.php');

Sees::core_import('controller.php');
Sees::core_import('view.php');
Sees::core_import('session.php');
Sees::core_import('database.php');
Sees::core_import('componentinstaller.php');
Sees::core_import('component.php');
Sees::core_import('interfaces.php');
Sees::core_import('exceptions.php');
Sees::core_import('route.php');
Sees::core_import('request.php');

?>
