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
 * @filesource  tl_content.php
 * @version     1.0.0
 * @since       18.09.15 - 17:52
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */

/**
 * Set Tablename: tl_content
 */
$strName = 'tl_content';

/* Selektors */
$GLOBALS['TL_DCA'][$strName]['palettes']['__selector__'][]  = 'ctsaddimage';
$GLOBALS['TL_DCA'][$strName]['palettes']['__selector__'][]  = 'ctsaddimagebg';

/* Subpalettes */
$GLOBALS['TL_DCA'][$strName]['subpalettes']['ctsaddimage']  = 'singleSRC,alt,title,size,floating,imageUrl,fullsize';
$GLOBALS['TL_DCA'][$strName]['subpalettes']['ctsaddimagebg']  = 'singleSRC';

/* Fields */
$GLOBALS['TL_DCA'][$strName]['fields']['variant'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['variant'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'eval'                    => array('chosen' => true, 'alwaysSave' => true, 'tl_class' => 'w50'),
    'options_callback'        => array('\\esit\\ctscore\\classes\\contao\\helper\\OptionHelper', 'getOptions'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctstemplate'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctstemplate'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('\\esit\\ctscore\\classes\\contao\\helper\\TemplateHelper', 'getTemplates'),
    'eval'                    => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsjstemplate'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsjstemplate'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('\\esit\\ctscore\\classes\\contao\\helper\\TemplateHelper', 'getJsTemplates'),
    'eval'                    => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['iconclass'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['iconclass'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['plaintext'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['plaintext'],
    'exclude'                 => true,
    'inputType'               => 'textarea',
    'eval'                    => array('tl_class' => 'clr'),
    'sql'                     => "mediumtext NULL"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsbgcolor'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsbgcolor'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsfontcolor'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsfontcolor'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsaddimage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsaddimage'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctsaddimagebg'] = array
(
    'label'                   => &$GLOBALS['TL_LANG'][$strName]['ctsaddimagebg'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);
