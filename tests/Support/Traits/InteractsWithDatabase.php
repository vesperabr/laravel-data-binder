<?php

namespace Vespera\DataBinder\Tests\Support\Traits;

use Illuminate\Database\Eloquent\Model;

trait InteractsWithDatabase
{
    protected function setupDatabase()
    {
        Model::unguard();

        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        include_once dirname(__DIR__, 2) . '/database/create_posts_table.php';
        include_once dirname(__DIR__, 2) . '/database/create_comments_table.php';
        include_once dirname(__DIR__, 2) . '/database/create_comment_post_table.php';
        include_once dirname(__DIR__, 2) . '/database/create_commentables_table.php';

        (new \CreatePostsTable)->up();
        (new \CreateCommentsTable)->up();
        (new \CreateCommentPostTable)->up();
        (new \CreateCommentablesTable)->up();
    }
}
