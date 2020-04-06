<?php

namespace Kanboard\Plugin\MultipleAssignees\Model;

use Kanboard\Core\Base;
use Kanboard\Model\GroupModel;

class GroupAssigneeModel extends Base
{
    /**
     * SQL table name.
     *
     * @var string
     */
    const TABLE = 'task_has_groups';

    /**
     * Return assigned groups for a specific task.
     *
     * @param mixed $task_id task id
     *
     * @return array
     */
    public function getGroupsForTask($task_id): array
    {
        $group_ids = $this->db->table(self::TABLE)
            ->eq('task_id', $task_id)
            ->findAllByColumn('group_id')
        ;

        if (empty($group_ids)) {
            return [];
        }

        return $this->db->table(GroupModel::TABLE)->in('id', $group_ids)->findAll();
    }

    /**
     * Add a group to a task.
     *
     * @param mixed $task_id  task id
     * @param mixed $group_id group id
     *
     * @return void
     */
    public function addGroupToTask($task_id, $group_id)
    {
        // TODO: add method content
    }

    /**
     * Remove a group from a task.
     *
     * @param mixed $task_id  task id
     * @param mixed $group_id group id
     *
     * @return void
     */
    public function removeGroupFromTask($task_id, $group_id)
    {
        // TODO: add method content
    }
}
