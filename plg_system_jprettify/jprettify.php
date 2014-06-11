<?php
/**
 * @package    JPrettify
 * @subpackage Base
 * @author     OSTree Team {@link http://www.ostree.org}
 * @author     Created on 09-Feb-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

jimport('joomla.plugin.plugin');

/**
 * System Plugin.
 *
 * @package    jprettify
 * @subpackage Plugin
 */
class plgSystemJPrettify extends JPlugin
{
    /**
     * Constructor
     *
     * @param object $subject The object to observe
     * @param array $config  An array that holds the plugin configuration
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }

    //function


    public function onBeforeRender()
    {
        $app = JFactory::getApplication();
        //ignore admin
        if ($app->isAdmin()) {
            return true;
        }
        $doc = JFactory::getDocument();

        JFactory::getLanguage()->load('plg_system_jprettify', JPATH_ADMINISTRATOR);

        $doc->addScript(JURI::root(true) . '/media/google-code-prettify/prettify.js');
        $doc->addScript(JURI::root(true) . '/media/google-code-prettify/lang-mma.js');

        $doc->addStyleSheet(JURI::root(true) . '/media/google-code-prettify/prettify.css');

        $html = "\nwindow.addEvent('domready', function() { prettyPrint();});\n";

        $doc->addScriptDeclaration($html);
    }


}//class
