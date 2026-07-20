<?php

namespace app\components;

use yii\rbac\Rule;

class CommentAuthorRule extends Rule
{
    public $name = 'isCommentAuthor';

    public function execute($user, $item, $params)
    {
        $comment = $params['comment'] ?? null;

        if (!$comment) {
            return false;
        }

        return $comment->user_id == $user;
    }
}