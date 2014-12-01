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
		
		// TODO: Improvet this depending params
		$attrs = array();
		/** Params
		  * rel = prev, next, canonical
		  * href = URL
		  * If not url, offset ( e. g. offset=page ) -> Process current url depending on the offset, check integer, and so on...
		**/
		
		$out->addLink( $attrs );
		return true;
	}


}
