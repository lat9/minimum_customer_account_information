<?php
/* Load the ot_shipping language file ... */
if (file_exists($language_page_directory . 'modules/order_total' . $template_dir . '/ot_shipping.php')) {
  require($language_page_directory . 'modules/order_totals' . $template_dir . '/ot_shipping.php');
} else {
  require($language_page_directory . 'modules/order_total/ot_shipping.php');
}