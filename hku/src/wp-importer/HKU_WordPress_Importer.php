<?php

namespace HKU\Theme;

class HKU_WordPress_Importer {

	/**
	 * Setups filters.
	 *
	 * @since 2.8
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'maybe_wordpress_importer' ) );
	}

	/**
	 * If WordPress Importer is active, replace the wordpress_importer_init function.
	 *
	 * @since 1.2
	 */
	public function maybe_wordpress_importer() {
		if ( defined( 'WP_LOAD_IMPORTERS' ) && class_exists( 'WP_Import' ) ) {
			remove_action( 'admin_init', 'wordpress_importer_init' );
			add_action( 'admin_init', array( $this, 'wordpress_importer_init' ) );
		}
	}

	public function wordpress_importer_init() {
		$GLOBALS['wp_import'] = new HKU_WP_Import();
		register_importer( 'wordpress', 'WordPress', "HKU Migration", array( $GLOBALS['wp_import'], 'dispatch' ) ); // phpcs:ignore WordPress.WP.CapitalPDangit.MisspelledInText
	}

}
