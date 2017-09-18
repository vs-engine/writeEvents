<?php

/**
 * The home manager controller for writeEvents.
 *
 */
class writeEventsHomeManagerController extends modExtraManagerController
{
    /** @var writeEvents $writeEvents */
    public $writeEvents;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('writeevents_core_path', null,
                $this->modx->getOption('core_path') . 'components/writeevents/') . 'model/writeevents/';
        $this->writeEvents = $this->modx->getService('writeevents', 'writeEvents', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('writeevents:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('writeevents');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->writeEvents->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->writeEvents->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/writeevents.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->writeEvents->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        writeEvents.config = ' . json_encode($this->writeEvents->config) . ';
        writeEvents.config.connector_url = "' . $this->writeEvents->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "writeevents-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->writeEvents->config['templatesPath'] . 'home.tpl';
    }
}