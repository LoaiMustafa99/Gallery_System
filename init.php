<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS .'xampp' . DS . 'htdocs' . DS . 'gallary' . DS . 'Gallery_Website');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once("includes/function.php");
require_once("admin/includes/config.php");
require_once("admin/includes/database.php");
require_once("admin/includes/comment.php");
require_once("admin/includes/db_object.php");
require_once("admin/includes/user.php");
require_once("admin/includes/photo.php");
require_once("admin/includes/session.php");

?>