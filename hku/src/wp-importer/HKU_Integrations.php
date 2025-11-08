<?php

namespace HKU\Theme;

use AllowDynamicProperties;

#[AllowDynamicProperties]
class HKU_Integrations {
	/**
	 * Singleton instance.
	 *
	 * @var HKU_Integrations|null
	 */
	protected static $instance = null;

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 */
	protected function __construct() {}

	/**
	 * Returns the single instance of the class.
	 *
	 * @since 1.7
	 *
	 * @return self
	 */
	public static function instance(): self {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Requires integrations.
	 *
	 * @since 3.7
	 *
	 * @return void
	 */
	protected function init(): void {
		// Loads external integrations.
		foreach ( glob( __DIR__ . '/load.php', GLOB_NOSORT ) as $load_script ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable
			require_once $load_script; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		}
	}
}

class_alias( 'HKU\Theme\HKU_Integrations', 'HKU_Plugins_Compat' ); // For Backward compatibility.
