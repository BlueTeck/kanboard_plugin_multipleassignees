<label for="form-group-assignee"><?php echo t('Group assignees:'); ?></label>


<?= $this->helper->MultipleAssigneesFormHelper->renderGroupField($values, $errors) ?>