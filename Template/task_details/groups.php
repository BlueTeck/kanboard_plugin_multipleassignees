<li>
    <strong><?php echo t('Group assignees:'); ?></strong>
    <div class="task-tags">
        <ul>
            <?php foreach ($this->task->groupAssigneeModel->getGroupsForTask($task['id']) as $group) { ?>
                <li class="task-tag">
                    <?php echo $group['name']; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</li>