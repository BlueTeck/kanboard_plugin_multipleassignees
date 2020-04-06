<?php

namespace Kanboard\Plugin\MultipleAssignees;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        //Task
        // detail view
        $this->template->hook->attach('template:task:details:third-column', 'MultipleAssignees:task_details/groups');
        $this->template->hook->attach('template:task:details:third-column', 'MultipleAssignees:task_details/users');

        //Forms
        // task creation and modification
        $this->template->hook->attach('template:task:form:second-column', 'MultipleAssignees:task_form/groups');
        $this->template->hook->attach('template:task:form:second-column', 'MultipleAssignees:task_form/users');

        //Board
        // filter dropdown
        // card content
    }

    public function getClasses()
    {
        return [
            'Plugin\MultipleAssignees\Model' => [
                'GroupAssigneeModel',
            ],
        ];
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
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
