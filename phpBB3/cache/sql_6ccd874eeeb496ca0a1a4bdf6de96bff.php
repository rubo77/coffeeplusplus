<?php exit; ?>
1353801472
SELECT ban_ip, ban_userid, ban_email, ban_exclude, ban_give_reason, ban_end FROM phpbb_banlist WHERE (ban_ip = '' OR ban_exclude = 1) AND (ban_userid = 0 OR ban_exclude = 1)
183
a:1:{i:0;a:6:{s:6:"ban_ip";s:0:"";s:10:"ban_userid";s:1:"0";s:9:"ban_email";s:18:"ewzex@yahoo.com.hk";s:11:"ban_exclude";s:1:"0";s:15:"ban_give_reason";s:0:"";s:7:"ban_end";s:1:"0";}}