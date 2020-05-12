<?php

namespace Kanboard\Plugin\MultipleAssignees\Helper;

use Kanboard\Core\Base;

class FormHelper extends Base
{
    public function renderGroupField(array $values, array $errors = [])
    {
        // based on Kanboard\Helper\TaskHelper->renderTagField
        if (isset($values['project_id']) && !$this->helper->projectRole->canChangeAssignee($values)) {
            return '';
        }
        $groups = $this->projectGroupRoleModel->getGroups($values['project_id']);
        $selected_groups = []; // TODO

        $html = '<input type="hidden" name="groups[]" value="">';
        $html .= '<select name="groups[]" id="form-groups" class="tag-autocomplete" multiple>';

        foreach ($groups as $group) {
            $html .= sprintf(
                '<option value="%s" %s>%s</option>',
                $this->helper->text->e($group['name']),
                in_array($group, $selected_groups) ? 'selected="selected"' : '',
                $this->helper->text->e($group['name'])
            );
        }

        $html .= '</select>';

        return $html;
    }

}
