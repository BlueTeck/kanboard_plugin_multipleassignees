<?php

namespace Kanboard\Plugin\MultipleAssignees;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        
    }
    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }
    public function getPluginName()
    {
        return 'MultipleAssignees';
    }
    public function getPluginDescription()
    {
        return t('Assign multiple users or groups to a task');
    }
    public function getPluginAuthor()
    {
        return 'BlueTeck';
    }
    public function getPluginVersion()
    {
        return '1.0.0';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_multipleassignees';
    }
    public function getCompatibleVersion()
    {
        return '>1.2.13';
    }
}
