<?php
if(!defined('TYPO3_MODE')) {
  die('Access denied.');
}

// Hook to process mediaquery
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['getImageSourceCollection'][] = 'LEF\\LefBootstrapTheme\\Hooks\\ContentObject\\ContentObjectOneSourceCollectionHook';


