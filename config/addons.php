<?php

return array (
  'autoload' => false,
  'hooks' => 
  array (
    'show_map' => 
    array (
      0 => '\\addons\\address\\Address',
    ),
    'upload_after' => 
    array (
      0 => '\\addons\\alioss\\Alioss',
      1 => '\\addons\\qiniu\\Qiniu',
    ),
    'upload_delete' => 
    array (
      0 => '\\addons\\alioss\\Alioss',
      1 => '\\addons\\qiniu\\Qiniu',
    ),
    'app_init' => 
    array (
      0 => '\\addons\\alioss\\Alioss',
      1 => '\\addons\\phpmailer\\Phpmailer',
      2 => '\\addons\\queue\\Queue',
      3 => '\\app\\cms\\behavior\\Hooks',
    ),
    'baidupush' => 
    array (
      0 => '\\addons\\baidupush\\Baidupush',
    ),
    'sms_send' => 
    array (
      0 => '\\addons\\easysms\\Easysms',
    ),
    'sms_notice' => 
    array (
      0 => '\\addons\\easysms\\Easysms',
    ),
    'sms_check' => 
    array (
      0 => '\\addons\\easysms\\Easysms',
    ),
    'markdown' => 
    array (
      0 => '\\addons\\editormd\\Editormd',
    ),
    'ems_send' => 
    array (
      0 => '\\addons\\phpmailer\\Phpmailer',
      1 => '\\addons\\saiyouems\\Saiyouems',
    ),
    'ems_notice' => 
    array (
      0 => '\\addons\\phpmailer\\Phpmailer',
      1 => '\\addons\\saiyouems\\Saiyouems',
    ),
    'ems_check' => 
    array (
      0 => '\\addons\\phpmailer\\Phpmailer',
      1 => '\\addons\\saiyouems\\Saiyouems',
    ),
    'page_footer' => 
    array (
      0 => '\\addons\\returntop\\Returntop',
    ),
    'user_sidenav_after' => 
    array (
      0 => '\\addons\\signin\\Signin',
      1 => '\\app\\cms\\behavior\\Hooks',
    ),
    'sync_login' => 
    array (
      0 => '\\addons\\synclogin\\Synclogin',
    ),
    'user_config' => 
    array (
      0 => '\\addons\\synclogin\\Synclogin',
    ),
    'action_begin' => 
    array (
      0 => '\\addons\\vaptcha\\Vaptcha',
    ),
    'admin_login_form' => 
    array (
      0 => '\\addons\\vaptcha\\Vaptcha',
    ),
    'xunsearch_index_reset' => 
    array (
      0 => '\\app\\cms\\behavior\\Hooks',
    ),
  ),
  'route' => 
  array (
  ),
);