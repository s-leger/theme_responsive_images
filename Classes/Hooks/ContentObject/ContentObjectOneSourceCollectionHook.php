<?php
namespace LEF\LefBootstrapTheme\Hooks\ContentObject;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * Processing of mediaQueries (string replace of "," separated params)
 * min, max, density tag, pixelDensity
 * 
 */
class ContentObjectOneSourceCollectionHook  implements \TYPO3\CMS\Frontend\ContentObject\ContentObjectOneSourceCollectionHookInterface {

	/**
	 * Renders One Source Collection
	 *
	 * @param array $sourceRenderConfiguration Array with TypoScript Properties for the imgResource
	 * @param array $sourceConfiguration
	 * @param string $oneSourceCollection already prerendered SourceCollection
	 * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $parentObject Parent content object
	 * @internal param array $configuration Array with the Source Configuration
	 * @return string HTML Content for oneSourceCollection
	 */
	public function getOneSourceCollection(array $sourceRenderConfiguration, array $sourceConfiguration, $oneSourceCollection, \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer &$parentObject){
	        
		$mediaQueryStr = $sourceConfiguration['mediaQuery'];
		$mediaQuery = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $mediaQueryStr);

		$res = "";
		$len = count($mediaQuery);
		$min        = ($len > 0 && $mediaQuery[0]) ? (int)$mediaQuery[0] : false;
		$max 	    = ($len > 1 && $mediaQuery[1]) ? (int)$mediaQuery[1] : false;
		$densityTag = ($len > 2 && $mediaQuery[2]) ? $mediaQuery[2] : false;
		$density    = ($len > 3 && $mediaQuery[3]) ? (int)$mediaQuery[3] : false;
		if ($min) {
			$res .= "(min-width:" . $min . "px)";
		}
		if ($min && $max){
			$res .= " AND ";
		}
		if ($max){
			$res .= "(max-width:" . ($max-1) . "px)";
		}
		if ($densityTag && $density){
			if ($min || $max){
				$res .= " AND ";
			}
			$res .= "(" . $densityTag . ":" . $density . ")";
		}
		if ($len > 0){
		   $oneSourceCollection = str_replace($mediaQueryStr, $res, $oneSourceCollection);
		}
		
	return $oneSourceCollection;
	}
}