<?php

class Linkrel {

	
	/**
	 * @param $parser Parser
	 * @param $frame PPFrame
	 * @param $args array
	 * @return string
	 */
	public static function process_linkrel( &$parser, $frame, $args ) {

		// Get output from Parser
		$out = $parser->getOutput();
		
		
		$attrs_ref_common = array( "rel", "href" );

		// Get current URL
		$url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		$offset = "";
		$num = 1;
		
		// TODO: Improvet this depending params
		$attrs = array();
		/** Params
		  * rel = prev, next, canonical
		  * href = URL
		  * If not url, offset ( e. g. offset=page ) -> Process current url depending on the offset, check integer, and so on...
		**/
		foreach ( $args as $arg ) {
			$arg_clean = trim( $frame->expand( $arg ) );
			$arg_proc = explode( "=", $arg_clean, 2 );

			
			if ( count( $arg_proc ) > 1 ){
		
				if ( in_array( trim( $arg_proc[0] ), $attrs_ref_common ) ) {
					$attrs[ trim( $arg_proc[0] ) ] = trim( $arg_proc[1] );
					
				}
				
				if ( trim( $arg_proc[0] ) == 'offset' ) {
					$offset = trim( $arg_proc[1] );
					
				}
				if ( trim( $arg_proc[0] ) == 'num' ) {
					$num = trim( $arg_proc[1] );
					
				}
			}
		}
	
		if ( ! empty( $offset ) ) {
			
			$matches = preg_grep( "/($offset=\d+)/", $url );
			
			// Continue here
			if ( count($matches) > 0 ) {
				
				$offarr = explode( "=", $matches[0], 2 );

			} else {
				
				
			}

		}

		
		$out->addLink( $attrs );
		return true;
	}


}
