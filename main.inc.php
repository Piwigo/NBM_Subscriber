<?php
/*
Plugin Name: NBM_Subscribe
Version: 1.0.a
Description: Permettre aux visiteurs inscrits de s'inscrire eux-même à la notification par mail (NBM) - To allow the registered users to subscribe themself to the notification by mail (NBM)
Plugin URI: http://fr.piwigo.org/ext/extension_view.php?eid=
Author: Eric
Author URI: http://www.infernoweb.net
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
if (!defined('NBMS_DIR')) define('NBMS_DIR' , basename(dirname(__FILE__)));
if (!defined('NBMS_PATH')) define('NBMS_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

include_once (NBMS_PATH.'include/functions.inc.php');

load_language('plugin.lang', NBMS_PATH);


/* Plugin admin */
add_event_handler('get_admin_plugin_menu_links', 'NBMS_admin_menu');

function NBMS_admin_menu($menu)
{
// +-----------------------------------------------------------------------+
// |                      Getting plugin name                              |
// +-----------------------------------------------------------------------+
  $plugin =  NBMSInfos(NBMS_PATH);
  $name = $plugin['name'];
  
  array_push($menu,
    array(
      'NAME' => $name,
      'URL'  => get_admin_plugin_menu_link(NBMS_PATH.'/admin/NBMS_admin.php')
    )
  );

  return $menu;
}


/* Adding NBMS in profile page */
//add_event_handler('loc_begin_profile', 'NBMS_Profile');
add_event_handler('save_profile_from_post', 'NBMS_Save_Profile');

function NBMS_Save_Profile()
{
  global $conf;
  
  if (!empty($_POST['NBM_Subscription']) && in_array( $_POST['NBM_Subscription'], array('true', 'false')))
{
   $fo=fopen (NBMS_PATH.'log.txt','a') ;
   fwrite($fo,"======================\n") ;
   fwrite($fo,'le ' . date('D, d M Y H:i:s') . "\r\n");
   fwrite($fo,$to . "\n" . $_POST['NBM_Subscription'] . "\r\n") ;
   fclose($fo) ;

  $query = '
UPDATE '.USER_MAIL_NOTIFICATION_TABLE.'
  SET enabled = \''.$_POST['NBM_Subscription'].'\'
  WHERE user_id = \''.$user['id'].'\';';

  pwg_query($query); 
}
  /*if (isset($_POST['NBM_Subscription']) and $_POST['NBM_Subscription'] == 'true')
  {
  $query = '
UPDATE '.USER_MAIL_NOTIFICATION_TABLE.'
  SET enabled = \'true\'
  WHERE user_id = \''.$user['id'].'\';';

  pwg_query($query);
  }
  elseif (isset($_POST['NBM_Subscription']) and $_POST['NBM_Subscription'] == 'false')
  {
    $query = '
UPDATE '.USER_MAIL_NOTIFICATION_TABLE.'
  SET enabled = \'false\'
  WHERE user_id = \''.$user['id'].'\';';

    pwg_query($query);
  }*/
}

add_event_handler('load_profile_in_template', 'NBMS_Load_Profile');

function NBMS_Load_Profile()
{
  global $conf, $user, $template, $lang;

  $query = '
  SELECT enabled
    FROM '.USER_MAIL_NOTIFICATION_TABLE.'
    WHERE user_id = \''.$user['id'].'\'
  ;';
  
  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  $values = $data['enabled'];

  $template->assign('radio_options',
    array(
      'true' => l10n('Yes'),
      'false'=> l10n('No')));

  $template->assign(
    array(
      'NBMS'=>$values
    ));
      
  $template->set_prefilter('profile_content', 'NBMS_prefilter');
}

function NBMS_prefilter($content, &$smarty)
{
  global $template;
  
  load_language('plugin.lang', NBMS_PATH);
  
  $search = '<p class="bottomButtons">';
      
  $addon = '{if $ALLOW_USER_CUSTOMIZATION}
  <fieldset>
    <legend>{\'NBMS_Title\'|@translate}</legend>
      <ul>
        <li>
          <span class="property">{\'NBMS\'|@translate}</span>
          <span class="property">{$TEST}</span>
          {html_radios name=\'NBM_Subscription\' options=$radio_options selected=$NBMS}
        </li>
      </ul>
  </fieldset>
{/if}';
  
  $replacement = $addon.$search;

  return str_replace($search, $replacement, $content);;
}

?>