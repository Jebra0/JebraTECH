<?php

namespace Tests\Unit;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\GraphQL\Mutations\Blogs\CreatBlog;


class CreatBlogTest extends TestCase
{

    public function test_if_blog_is_created(): void
    {
        // Mock the input arguments for the resolver
        $args = [
            'title' => 'Test Blog Title',
            'body' => 'Test Blog Body',
            'is_hidden' => false,
            'description' => 'Test Blog Description',
            'category_id' => 10, // Replace with an existing category ID
            'writter_id' => 3, // Replace with an existing user ID
        ];

        // Create an instance of the resolver
        $resolver = new CreatBlog();

        // Invoke the resolver
        $result = $resolver->__invoke(null, $args);

        // Assertions
        $this->assertInstanceOf(Blog::class, $result);
        $this->assertEquals($args['title'], $result->title);
        $this->assertEquals($args['body'], $result->body);
        $this->assertEquals($args['description'], $result->description);
        $this->assertEquals($args['is_hidden'], $result->is_hidden);
        $this->assertEquals($args['category_id'], $result->category_id);
        $this->assertEquals($args['writter_id'], $result->writter_id);

    }
}
