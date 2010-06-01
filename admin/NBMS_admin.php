<?php

global $lang;

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+
check_status(ACCESS_ADMINISTRATOR);

if (!defined('NBMS_PATH')) define('NBMS_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

load_language('plugin.lang', NBMS_PATH);


// +-----------------------------------------------------------------------+
// |                      Getting plugin version                           |
// +-----------------------------------------------------------------------+
$plugin =  NBMSInfos(NBMS_PATH);
$version = $plugin['version'];
$name = $plugin['name'];


// +-----------------------------------------------------------------------+
// |                           templates init                              |
// +-----------------------------------------------------------------------+
  $template->assign(
    array(
    'NBMS_NAME'     =>  $name,
    'NBMS_VERSION'  =>  $version,
    )
  );

// +-----------------------------------------------------------------------+
// |                           templates display                           |
// +-----------------------------------------------------------------------+
  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/template/NBMS_admin.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>