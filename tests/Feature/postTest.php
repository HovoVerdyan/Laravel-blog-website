<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\BlogPost;

class postTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //    $response->assertStatus(200);
    // }


    /**
     * A basic feature test example.
     *
     * @test
     */
    public function onePostTestWithoutComments()
    {
        //Arrange
        $post = new BlogPost();
        $post->title = "Test Title";
        $post->content = "Test Content";
        $post->save();

        //Act
        $response = $this->get('/posts');

        //Assert
        $response->assertSeeText('Test Title');
        $response->assertSeeText('No comments yet!');

        $this->assertDatabaseHas('blog_posts', [
            'title' => "Test Title"
        ]);

    }

    public function onePostTestWithComments()
    {
        $post = new BlogPost();
        $post->title = "Test With Comments";
        $post->content = "Test Content with Comments";
        $post->save();

        factory(Comment::class, 4)->create([
            'blog_post_id' => $post->id
        ]);

        $response-= $this->get('/posts');

        $response->assertSeeText('4 comments');

    }

    public function testStoreValid()
    {

      $params = [
        'title' => 'Valid Post',
        'content' => 'Valid Content'
      ];


      $this->actingAs($this->user())
        ->post('/posts', $params)
        ->assertStatus(302)
        ->assertSessionhas('status');

      $this->assertEquals(session('status'), 'The blog post has been created');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
          ];

          $this->actingAs($this->user())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

          $messages = session('errors')->getMessages();

          $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
          $this->assertEquals($messages['content'][0], 'The content must be at least 5 characters.');
    }

    public function testUpdateValid()
    {
        $post = new BlogPost();
        $post->title = "Testing Putter Title";
        $post->content = "Testing Putter Content";
        $post->save();
        //dd($post->toArray());
        //Assert
        $this->assertDatabaseHas('blog_posts', [
            'title' => $post->title,
            'content' => $post->content
        ]);

        $params = [
            'title' => 'x men is a good movie',
            'content' => 'y men is a good movie'
          ];

          $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The post has been updated');

    }

    public function deletePost()
    {
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts', [
            'title' => $post->title,
            'content' => $post->content
        ]);

        $post->delete("/posts/{$post->id}")
        ->assertStatus(302)
        ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post was deleted');
    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = "Testing Putter Title";
        $post->content = "Testing Putter Content";
        $post->save();

        return $post;
    }

}
