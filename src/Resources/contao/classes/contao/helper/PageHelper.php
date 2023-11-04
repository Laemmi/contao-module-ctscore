<?php
/**
 * @package     Contao Themes-Shop
 * @filesource  PageHelper.php
 * @version     1.0.0
 * @since       22.09.15 - 17:31
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */
namespace esit\ctscore\classes\contao\helper;

class PageHelper
{


    /**
     * Stellt den Contao-PagePicker für Module zur Verfügung.
     * @param $dc
     * @return string
     */
    public function pagePicker($dc)
    {
        $strLink = ' <a href="';
        $strLink .= ((strpos($dc->value, '{{link_url::') !== false) ? 'contao/page.php' : 'contao/file.php');
        $strLink .= '?do=' . \Contao\Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field;
        $strLink .= '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '&amp;switch=1';
        $strLink .= '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']);
        $strLink .= '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\'';
        $strLink .= specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0]));
        $strLink .= '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_';
        $strLink .= $dc->field . ((\Contao\Input::get('act') == 'editAll') ? '_' . $dc->id : '');
        $strLink .= '\',\'self\':this});return false">';
        $strLink .= \Contao\Image::getHtml(
            'pickpage.gif',
            $GLOBALS['TL_LANG']['MSC']['pagepicker'],
            'style="vertical-align:top;cursor:pointer"'
        );
        $strLink .= '</a>';

        return $strLink;
    }
}
