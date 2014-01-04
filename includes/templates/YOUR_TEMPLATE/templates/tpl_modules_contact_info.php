<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2012 Vinos de Frutas Tropicales (lat9): Minimum Customer Account Information
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_contact_info.php lat9
 */
  require(DIR_WS_MODULES . zen_get_module_directory('contact_info.php'));
  $newsletter = ($customerInfo->fields['customers_newsletter'] == '1');
?>
  <h3 class="contactDefaultName"><?php echo zen_output_string_protected($customerInfo->fields['customers_firstname'] . ' ' . $customerInfo->fields['customers_lastname']); ?></h3>
  <hr />
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_TELEPHONE_NUMBER; ?></div><div class="ciData"><?php echo $customerInfo->fields['customers_telephone']; ?></div></div>
<?php
  if (ACCOUNT_FAX_NUMBER == 'true') {
?>
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_FAX_NUMBER; ?></div><div class="ciData"><?php echo $customerInfo->fields['customers_fax']; ?></div></div>
<?php
  }
  if (ACCOUNT_COMPANY == 'true') {
?>
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_COMPANY; ?></div><div class="ciData"><?php echo $customerInfo->fields['entry_company']; ?></div></div>
<?php
  }
?>
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_EMAIL_ADDRESS; ?></div><div class="ciData"><?php echo $customerInfo->fields['customers_email_address']; ?></div></div>
<?php
//-bof-v1.3.0a-Include country, if enabled
  if (defined('MIN_ACCOUNT_INCLUDE_COUNTRY') && MIN_ACCOUNT_INCLUDE_COUNTRY == 'true') {
?>
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_COUNTRY; ?></div><div class="ciData"><?php echo zen_get_country_name($customerInfo->fields['entry_country_id']); ?></div></div>
<?php
  }
//-eof-v1.3.0a
  if ($current_page_base != 'checkout_payment' && $current_page_base != 'checkout_confirmation') { 
?>
  <div class="ciLine"><div class="ciLabel"><?php echo ENTRY_EMAIL_PREFERENCE . ':'; ?></div><div class="ciData"><?php echo (($newsletter) ? ENTRY_NEWSLETTER_YES : ENTRY_NEWSLETTER_NO) . '<span class="ci' . (($newsletter) ? 'Yes' : 'No') . '">&nbsp;</span>, ' . $customerInfo->fields['customers_email_format']; ?></div></div>
<?php
  }