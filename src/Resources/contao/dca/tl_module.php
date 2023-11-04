<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 *
 * @package     Contao Themes-Shop
 * @filesource  tl_modules.php
 * @version     1.0.0
 * @since       22.09.15 - 17:15
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */

/**
 * Set Tablename: tl_modules
 */
$strName = 'tl_module';

/* Selektors */
$GLOBALS['TL_DCA'][$strName]['palettes']['__selector__'][]  = 'ctsaddimage';

/* Subpalettes */
$GLOBALS['TL_DCA'][$strName]['subpalettes']['ctsaddimage']  = 'singleSRC,alt,title,imgSize';

/* Fields */
$GLOBALS['TL_DCA'][$strName]['fields']['ctsaddimage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsaddimage'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsurl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'w50 wizard'),
    'wizard' => array
    (
        array('\\esit\\ctscore\\classes\\contao\\helper\\PageHelper', 'pagePicker')
    ),
    'sql'                     => "varchar(255) NOT NULL default ''"
);