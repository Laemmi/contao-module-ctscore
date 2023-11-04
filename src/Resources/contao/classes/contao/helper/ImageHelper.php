<?php
/**
 * @package     Contao Themes-Shop
 * @filesource  ImageHelper.php
 * @version     1.0.0
 * @since       21.09.15 - 17:41
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */
namespace esit\ctscore\classes\contao\helper;

class ImageHelper
{


    /**
     * Gibt die Ausgabe zurück.
     * @param            $arrData
     * @param string     $strTemplate
     * @param bool|false $addImgLink
     * @return string
     */
    public static function compile($arrData, $strTemplate = 'ce_inc_ctsimage', $addImgLink = false)
    {
        if ($addImgLink && $arrData['url']) {
            // Bei Inhaltselementen dem Bild ein Link hinzufügen
            $arrData['href'] = $arrData['url'];
        }
        if ($addImgLink && $arrData['ctsurl']) {
            // Bei Modulen dem Bild ein Link hinzufügen
            $arrData['href'] = $arrData['ctsurl'];
        }
        if (isset($arrData['imgSize']) && $arrData['imgSize']) {
            // Bildausschnitt bei Module in das richtige Feld schreiben
            $arrData['size'] = $arrData['imgSize'];
        }
        $objTemplate = new \Contao\FrontendTemplate($strTemplate);
        $objTemplate->setData($arrData);
        if ($arrData['ctsaddimage'] && $arrData['singleSRC'] != '') {
            $objModel = \FilesModel::findByUuid($arrData['singleSRC']);
            if (is_file(TL_ROOT . '/' . $objModel->path)) {
                $arrData['singleSRC'] = $objModel->path;
                \Contao\Controller::addImageToTemplate($objTemplate, $arrData);
            }
        }

        return $objTemplate->parse();
    }
}
