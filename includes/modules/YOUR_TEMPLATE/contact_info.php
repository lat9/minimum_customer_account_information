<?php
/**
 * loaded by tpl_modules_contact_info.php
 *
 * @package page
 * @copyright Copyright 2012 Vinos de Frutas Tropicales (lat9): Minimum Customer Account Information
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: contact_info.php
 */

// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_CONTACT_INFO');

/*  prepare address list */
$customer_query = "SELECT c.customers_firstname, c.customers_lastname, c.customers_email_address, c.customers_telephone, c.customers_newsletter, c.customers_email_format, c.customers_fax, ab.entry_company, ab.entry_country_id
                    FROM   " . TABLE_CUSTOMERS . " c, " . TABLE_ADDRESS_BOOK . " ab
                    WHERE  c.customers_id = :customersID
                    AND    ab.customers_id = c.customers_id";  /*v1.3.0-added entry_country_id*/

$customer_query = $db->bindVars($customer_query, ':customersID', $_SESSION['customer_id'], 'integer');
$customerInfo = $db->Execute($customer_query);

//-bof-v1.3.0a-Fix-up for not recording country IDs in previous versions
if ($customerInfo->fields['entry_country_id'] == 0) {
  $customerInfo->fields['entry_country_id'] = SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY;
}
//-eof-v1.3.0a

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_CONTACT_INFO');