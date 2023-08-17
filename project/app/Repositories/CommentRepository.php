<?php

namespace App\Repositories;


use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model()
    {
        return Comment::class;
    }
}
