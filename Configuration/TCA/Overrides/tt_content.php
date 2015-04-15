<?php
if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
}

$tca = array (
        'tx_responsiveimages' => array (
                'exclude' => 0,
                'label' => 'LLL:EXT:lef_bootstrap_theme/Resources/Private/Language/locallang_db.xlf:tt_content.responsiveimages.options',
                'config' => array (
                        'type' => 'select',
                        'items' => array (
                                array('LLL:EXT:lef_bootstrap_theme/Resources/Private/Language/locallang_db.xlf:tt_content.responsiveimages.options.I.0', '1'),
                                array('LLL:EXT:lef_bootstrap_theme/Resources/Private/Language/locallang_db.xlf:tt_content.responsiveimages.options.I.1', '2'),
                        ),
                        'size' => 1,
                        'maxitems' => 1,
                )
        ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $tca,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'image_settings',
        'tx_responsiveimages',
        'after:image_effects'
);
