<?php
// -----
// Part of the Minimum Customer Account plugin for Zen Cart v1.5.0 and v1.5.1
//
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if (!defined('MIN_ACCOUNT_INCLUDE_COUNTRY')) {
  $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Minimum Account: Include Country?', 'MIN_ACCOUNT_INCLUDE_COUNTRY', 'false', 'If set to <em>true</em>, a customer is required to choose their home country during account setup.  If set to <em>false</em>, the country for all customers  will default to the value you set for <b>Create Account Default Country ID</b>.<br /><br />Default: <b>false</b>', '5', '7', 'zen_cfg_select_option(array(\'true\', \'false\'), ', NOW());");
  
  $db->Execute("UPDATE " . TABLE_ADDRESS_BOOK . " SET entry_country_id = '" . (int)SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY . "' WHERE entry_country_id = 0");

}