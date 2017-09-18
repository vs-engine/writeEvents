<?php

class writeEventsOfficeItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'writeEventsItem';
    public $classKey = 'writeEventsItem';
    public $languageTopics = array('writeevents');
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('writeevents_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var writeEventsItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('writeevents_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'writeEventsOfficeItemRemoveProcessor';