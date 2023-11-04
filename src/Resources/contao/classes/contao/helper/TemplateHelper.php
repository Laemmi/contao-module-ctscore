<?php
/**
 * @package     htdocs
 * @filesource  TemplateHelper.php
 * @version     1.0.0
 * @since       18.09.15 - 18:44
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */
namespace esit\ctscore\classes\contao\helper;

/**
 * Class TemplateHelper
 * @package esit\ctscore\classes\contao\helper
 */
class TemplateHelper
{


    /**
     * Liest die passenden Templates zum Inhaltselement aus.
     * (Callback für das Contao-DCA)
     * @param $objActiveRecord
     * @return array
     */
    public static function getTemplates($objActiveRecord)
    {
        $intId  = $objActiveRecord->id;
        $objCts = \Contao\ContentModel::findById($intId);

        return \Contao\Controller::getTemplateGroup('ce_' . $objCts->type);
    }


    /**
     * Liest die JavaScript-Templates zum Inhaltselement aus.
     * (Callback für das Contao-DCA)
     * @param $objActiveRecord
     * @return array
     */
    public static function getJsTemplates($objActiveRecord)
    {
        $intId  = $objActiveRecord->id;
        $objCts = \Contao\ContentModel::findById($intId);

        if (isset($GLOBALS['CTS']['templats']['js'][$objCts->type])) {
            $strTemplats = $GLOBALS['CTS']['templats']['js'][$objCts->type];
            return \Contao\Controller::getTemplateGroup($strTemplats);
        } else {
            // Fallack
            return \Contao\Controller::getTemplateGroup('ce_' . $objCts->type);
        }
    }


    /**
     * Erstellt das richtige Template und fürgt die Daten ein.
     * @param $strTemplate
     * @param $arrData
     * @return \FrontendTemplate
     */
    public static function setupTemplate($strTemplate, $arrData)
    {
        if ($arrData['ctstemplate']) {
            $strTemplate = $arrData['ctstemplate'];
        } elseif ($arrData['ctsjstemplate']) {
            $strTemplate = $arrData['ctsjstemplate'];
        }

        $objTemplate = new \FrontendTemplate($strTemplate);
        $objTemplate->setData($arrData);
        return $objTemplate;
    }
}
