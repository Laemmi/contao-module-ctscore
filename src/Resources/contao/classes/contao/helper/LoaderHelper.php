<?php
/**
 * @package     Contao Themes-Shop
 * @filesource  contaoloader.php
 * @version     1.0.0
 * @since       02.04.15 - 10:16
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */
namespace esit\ctscore\classes\contao\helper;

class LoaderHelper
{


    /**
     * Ruft das Laden der Templates (*.html5, *.xhtml und *.html) für den
     * übergebenen Pfad (inkl. Unterordnern) auf.
     * @param $strPath
     */
    public static function loadTemplates($strPath, $strRgex = '/^.+\.[x]*html[5]*$/i')
    {
        $strPath  = self::makePath($strPath);
        $objFiles = self::getFiles($strPath, $strRgex);
        self::registerTemplates($objFiles);
    }


    /**
     * Ruft das Laden der Klassesn (*.php) für den
     * übergebenen Pfad (inkl. Unterordnern) auf.
     * @param        $strPath
     * @param string $strRgex
     */
    public static function loadClasses($strPath, $strRgex = '/^.+\.php$/i')
    {
        $strPath  = self::makePath($strPath);
        $objFiles = self::getFiles($strPath, $strRgex);
        self::registerClasses($objFiles);
    }


    /**
     * Registriert die gefundenen Templates bei Contao.
     * @param $objFiles
     */
    protected static function registerTemplates($objFiles)
    {
        foreach ($objFiles as $varFile) {
            $strFile = (is_array($varFile)) ? array_shift($varFile) : $varFile;
            $objFile = pathinfo($strFile);
            \TemplateLoader::addFile($objFile['filename'], str_replace(TL_ROOT . '/', '', $objFile['dirname']));
        }
    }


    /**
     * Registriert die gefundenen Klasses bei Contao.
     * @param $objFiles
     */
    protected static function registerClasses($objFiles)
    {
        foreach ($objFiles as $varFile) {
            $strFile      = (is_array($varFile)) ? array_shift($varFile) : $varFile;
            $objFile      = pathinfo($strFile);
            $strNamespace = self::registerNamespace($objFile['dirname']);
            $strClassname = $strNamespace . $objFile['filename'];
            $strPath      = str_replace(TL_ROOT . '/', '', $objFile['dirname']) . '/' . $objFile['basename'];
            \ClassLoader::addClass($strClassname, $strPath);
        }
    }


    /**
     * Prüft den übergebenen Pfad und ergänzt die fehlenden Bestandteile.
     * @param $strPath
     * @return mixed|string
     */
    protected static function makePath($strPath)
    {
        $strPath = (!substr_count($strPath, 'system/modules')) ? '/system/modules/' . $strPath : $strPath;
        $strPath = (!substr_count($strPath, TL_ROOT)) ? TL_ROOT . '/' . $strPath : $strPath;
        $strPath = str_replace('//', '/', $strPath);

        return $strPath;
    }


    /**
     * Registriert den Namespace bei Contao und gibt ihn zurück.
     * @param $strPath
     * @return mixed|string
     */
    protected static function registerNamespace($strPath)
    {
        $strNamespace = str_replace(TL_ROOT . '/system/modules/', '', $strPath);
        $strNamespace = str_replace('/', '\\', $strNamespace);
        $strNamespace = "esit\\$strNamespace\\";    // Keine Slash am Anfang, son frist Contao es nicht!
        \ClassLoader::addNamespace($strNamespace);

        return $strNamespace;
    }


    /**
     * Sucht die Templates im übergebenen Pfad.
     * @param $strPath
     * @return \RegexIterator
     */
    protected static function getFiles($strPath, $strRgex = '/^.+\.php$/i')
    {
        $objDirectory = new \RecursiveDirectoryIterator($strPath, \FilesystemIterator::SKIP_DOTS);
        $objIterator  = new \RecursiveIteratorIterator($objDirectory);
        $objTemplates = new \RegexIterator($objIterator, $strRgex, \RecursiveRegexIterator::GET_MATCH);

        return $objTemplates;
    }
}
