<?php

use HKU\Theme\HKU_Integrations;
use HKU\Theme\HKU_WordPress_Importer;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Don't access directly.
}

HKU_Integrations::instance()->wp_importer = new HKU_WordPress_Importer();
