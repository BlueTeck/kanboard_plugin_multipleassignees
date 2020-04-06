<?php

namespace Kanboard\Plugin\MultipleAssignees\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec('
        CREATE TABLE `task_has_users` (
            user_id INT NOT NULL,
            task_id INT NOT NULL,
            FOREIGN KEY(user_id) REFERENCES `users`(id) ON DELETE CASCADE,
            FOREIGN KEY(task_id) REFERENCES `tasks`(id) ON DELETE CASCADE,
            UNIQUE(task_id, user_id)
        ) ENGINE=InnoDB CHARSET=utf8
    ');
    
    $pdo->exec('
        CREATE TABLE `task_has_groups` (
            group_id INT NOT NULL,
            task_id INT NOT NULL,
            FOREIGN KEY(group_id) REFERENCES `groups`(id) ON DELETE CASCADE,
            FOREIGN KEY(task_id) REFERENCES `tasks`(id) ON DELETE CASCADE,
            UNIQUE(group_id, task_id)
        ) ENGINE=InnoDB CHARSET=utf8
    ');
}
