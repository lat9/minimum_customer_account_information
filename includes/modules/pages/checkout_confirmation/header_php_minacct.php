<?php
// Reset the breadcrumbs to remove the checkout_shipping page
$breadcrumb->reset();
$breadcrumb->add(HEADER_TITLE_CATALOG, zen_href_link(FILENAME_DEFAULT, '', 'NONSSL'));
$breadcrumb->add(NAVBAR_TITLE_2);