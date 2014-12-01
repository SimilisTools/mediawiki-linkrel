<?php


if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$GLOBALS['wgExtensionCredits']['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'Linkrel',
	'version' => '0.1',
	'url' => 'https://github.com/SimilisTools/mediawiki-linkrel',
	'author' => array( 'Toniher' ),
	'descriptionmsg' => 'linkrel-desc',
);

$GLOBALS['wgAutoloadClasses']['Linkrel'] = __DIR__.'/Linkrel_body.php';
$GLOBALS['wgMessagesDirs']['Linkrel'] = __DIR__ . '/i18n';
$GLOBALS['wgExtensionMessagesFiles']['Linkrel'] = __DIR__ . '/Linkrel.i18n.php';
$GLOBALS['wgExtensionMessagesFiles']['LinkrelMagic'] = __DIR__ . '/Linkrel.i18n.magic.php';

$GLOBALS['wgHooks']['ParserFirstCallInit'][] = 'wfRegisterLinkrel';


/**
 * @param $parser Parser
 * @return bool
 */
function wfRegisterLinkrel( $parser ) {
	$parser->setFunctionHook( 'linkrel', 'Linkrel::process_linkrel', SFH_OBJECT_ARGS );
	return true;
}
