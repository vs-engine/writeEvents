<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var writeEvents $writeEvents */
$writeEvents = $modx->getService('writeevents', 'writeEvents', $modx->getOption('writeevents_core_path', null,
        $modx->getOption('core_path') . 'components/writeevents/') . 'model/writeevents/'
);
$modx->lexicon->load('writeevents:default');

// handle request
$corePath = $modx->getOption('writeevents_core_path', null, $modx->getOption('core_path') . 'components/writeevents/');
$path = $modx->getOption('processorsPath', $writeEvents->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));