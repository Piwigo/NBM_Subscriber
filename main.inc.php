<?php
/*
Plugin Name: NBM Subscriber
Version: 1.0.2
Description: Permet aux visiteurs inscrits de gérer eux-même leur abonnement à la notification par mail (NBM) - Allows registered visitors to manage their own subscription to the notification by mail (NBM)
Plugin URI: http://fr.piwigo.org/ext/extension_view.php?eid=397
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


/* Saving from profile with added data */
add_event_handler('save_profile_from_post', 'NBMS_Save_Profile');

function NBMS_Save_Profile()
{
  global $conf, $user;
  
  include_once(PHPWG_ROOT_PATH.'admin/include/functions_notification_by_mail.inc.php');
  
  $query = '
SELECT *
FROM '.USER_MAIL_NOTIFICATION_TABLE.'
WHERE user_id = \''.$user['id'].'\'
';
  
  $count = pwg_db_num_rows(pwg_query($query));
  
  if ($count == 0)
  {
    $inserts = array();
    $check_key_list = array();
    
    // Calculate key
    $nbm_user['check_key'] = find_available_check_key();

    // Save key
    array_push($check_key_list, $nbm_user['check_key']);
    
    // Insert new nbm_users
    array_push
    (
      $inserts,
        array
        (
          'user_id' => $user['id'],
          'check_key' => $nbm_user['check_key'],
          'enabled' => 'false' // By default if false, set to true with specific functions
        )
    );

    mass_inserts(USER_MAIL_NOTIFICATION_TABLE, array('user_id', 'check_key', 'enabled'), $inserts);  
  }
  elseif ($count != 0 and !empty($_POST['NBM_Subscription']) && in_array($_POST['NBM_Subscription'], array('true', 'false')))
  {
    $query = '
UPDATE '.USER_MAIL_NOTIFICATION_TABLE.'
  SET enabled = \''.$_POST['NBM_Subscription'].'\'
  WHERE user_id = \''.$user['id'].'\';';

    pwg_query($query); 
  }
}

/* Adding NBMS in profile page */
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

/* Original template modification */
function NBMS_prefilter($content, &$smarty)
{
  global $template, $lang;
  
  load_language('plugin.lang', NBMS_PATH);
  
  $search = '<p class="bottomButtons">';
      
  $addon = '{if $ALLOW_USER_CUSTOMIZATION}
  <fieldset>
    <legend>{\'NBMS_Section\'|@translate}</legend>
      <ul>
        <li>
          <span class="property">{\'NBMS_Text\'|@translate}</span>
          {html_radios name=\'NBM_Subscription\' options=$radio_options selected=$NBMS}
        </li>
      </ul>
  </fieldset>
{/if}';
  
  $replacement = $addon.$search;

  return str_replace($search, $replacement, $content);
}
?>