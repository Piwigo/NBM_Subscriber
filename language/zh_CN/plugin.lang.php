<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2013 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['NBMS_Infos_Text'] = 'Piwigo提供了2种图库更新通知：<br>
- RSS 通知，所有访问者可用（即使未注册），在"RSS订阅"页面<br>
- 邮件通知(NBM)，与newsletter类似，仅供管理员或站长使用
<br><br>
本插件的目的是使每个<b><u>已注册</u></b>访问者可以自行决定是否订阅邮件通知。只需启用本插件（如果您读到本信息，说明本插件已启用），在用户资料页即可看到一个新的选项。
<br><br>
<b>重要</b>：用户通过本插件订阅或取消订阅邮件通知，图库并不会像管理员在管理面板进行此项操作那样发出确认email。这么做是为了避免可能导致图库发送邮件饱和的某些用户不良行为。
<br><br>
注意：本插件并不支持向用户介绍此可用新选项的信息，需要您——管理员或站长实现有关提示。为此，插件PWG_Stuffs将是个极佳的选择;-)';
$lang['NBMS_Section'] = '邮件通知';
$lang['NBMS_Text'] = '订阅邮件通知';
$lang['NBMS_Infos'] = '这是什么？';
$lang['NBMS_Support'] = '此插件的唯一技术支持在此Piwigo论坛主题：<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=16020" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=16020</a>';
$lang['NBMS_Title'] = 'NBM订阅器';
?>