<?php

class ArteVC {

	function __construct(){

		/** We safely integrate with VC with this hook */
		add_action( 'init', array( 'ArteVC', 'integrateWithVC' ) );

		/** Set as Theme */
		add_action( 'vc_before_init', array( 'ArteVC', 'set_as_theme' ) );

	}

	/** VC Integration */
	public static function integrateWithVC() {
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            return;

        }
    }

	/** Set as Theme */
	public static function set_as_theme() {
		vc_set_as_theme( true );
	}

}

/** Initialize the Class */
$arte_vc_extend = new ArteVC();

?>
