<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2012 Piwigo Team                  http://piwigo.org |
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
$lang['NBMS_Infos_Text'] = 'Piwigo предлагает два способа уведомления об изменениях в галерее:<br>
- Уведомление посредством RSS-каналов, доступное всем посетителям (Даже не зарегистрированным) в меню "Уведомление"<br>
- Уведомление по email (NBM), доступное только администратору либо вебместеру, похожее на новостную рассылку
<br><br>
Предназначение этого плагина в предоставлении возможности <b><u>зарегистрированным</u></b> пользователям подписываться и отписываться от NBM в любое время. Для этого просто активизируйте этот плагин (если вы читаете это сообщение, это значит что плагин уже активен) и на странице профиля посетителя появится эта новая опция.
<br><br>
<b>Важно</b> : Если пользователь подпишется либо отпишется от NBM при помощи нее, письмо с подтверждением отправлено не будет, как и в случае если это сделает администратор в административной панели. Это предназначено для предотвращения негативных отзывов некоторых пользователей, что приведет к накоплению email-ов отправляемых из галереи.
<br><br>
Примечание: Этот плагин не сообщает пользователю о новой опции в его профиле, это должно быть выполнено Вами, если требуется. Для этого больше всего подойдет плагин PWG_Stuffs  ;-)';
$lang['NBMS_Infos'] = 'Что это такое?';
$lang['NBMS_Section'] = 'Уведомление по email';
$lang['NBMS_Support'] = 'Поддержка этого плагина только в этой ветке форума Piwigo:<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=16020" onclick="window.open(this.href);return false;">English forum - http://piwigo.org/forum/viewtopic.php?id=16020</a>';
$lang['NBMS_Text'] = 'Подписаться на уведомление по email';
$lang['NBMS_Title'] = 'NBM Подписчик';
$lang['No'] = 'Нет';
$lang['Yes'] = 'Да';
?>