<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\GraphQL\Mutations\Blogs\ShowBlog;


class ShowBlogTest extends TestCase
{
    public function test_example(): void
    {
        $args = [
            'id' => 3
        ];

        $resolver = new ShowBlog();

        $result = $resolver->__invoke($args);
    }
}
