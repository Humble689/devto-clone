<?php

namespace app\components;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($user, $item, $params)
    {
        $post = $params['post'] ?? null;

        if (!$post) {
            return false;
        }

        return $post['created_by'] == $user;
    }
}