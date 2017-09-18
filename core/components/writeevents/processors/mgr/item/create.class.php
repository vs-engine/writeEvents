<?php

class writeEventsItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'writeEventsItem';
    public $classKey = 'writeEventsItem';
    public $languageTopics = array('writeevents');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('writeevents_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('writeevents_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'writeEventsItemCreateProcessor';