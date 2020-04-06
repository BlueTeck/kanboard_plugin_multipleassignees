<?php

namespace Kanboard\Plugin\MultipleAssignees\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec("
        CREATE TABLE task_has_users (
            task_id INTEGER NOT NULL,
            user_id INTEGER NOT NULL,
            FOREIGN KEY(task_id) REFERENCES tasks(id) ON DELETE CASCADE,
            FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
            UNIQUE(task_id, user_id)
        )
    ");

    $pdo->exec("
        CREATE TABLE task_has_groups (
            task_id INTEGER NOT NULL,
            group_id INTEGER NOT NULL,
            FOREIGN KEY(task_id) REFERENCES tasks(id) ON DELETE CASCADE,
            FOREIGN KEY(group_id) REFERENCES groups(id) ON DELETE CASCADE,
            UNIQUE(task_id, group_id)
        )
    ");
}