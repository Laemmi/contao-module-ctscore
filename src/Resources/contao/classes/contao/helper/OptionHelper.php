<?php
/**
 * @package     Contao Themes-Shop
 * @filesource  OptionHelper.php
 * @version     1.0.0
 * @since       18.09.15 - 18:44
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */

namespace esit\ctscore\classes\contao\helper;

/**
 * Class OptionHelper
 * @package esit\ctscore\classes\contao\helper
 */
class OptionHelper
{


    /**
     * Liest die passenden Optionen zum Inhaltselement und dem Feld aus aus.
     * (Callback für das Contao-DCA)
     * @param $objActiveRecord
     * @return array
     */
    public static function getOptions($objActiveRecord)
    {
        $strField   = $objActiveRecord->inputName;
        $intId      = $objActiveRecord->id;
        $objCts     = \Contao\ContentModel::findById($intId);

        return $GLOBALS['CTS'][$objCts->type][$strField]['options'];
    }


    public function getOptionsByField($objActiveRecord)
    {
        return $GLOBALS['CTS'][$objActiveRecord->inputName]['options'];
    }
}
