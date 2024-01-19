<?php

namespace Tests\Feature\Video;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;


class VideoTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     */
    use RefreshDatabase;

    public function users_can_view_videos(): void
    {
      //PREPARACIO

        $video=Video::create([
            'title' =>'Ubuntu 101',
            'description' =>'Here description',
            'url' =>'https://youtube/w8j07_DBl_I',
            'previous' =>null,
            'next' =>null,
            'series_id' =>1,
            'published_at' =>Carbon::parse('December 13,2020 8:00'),
        ]);

        //EXECUCIO
       $response =  $this->get('/videos/'. $video->id);





        //ASSERCIO -COMPROVACIO
        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('Here description');
        $response->assertSee('December 13');

    }
    /**
     * A basic feature test example.
     * @test
     */
    use RefreshDatabase;

    public function users_cannot_view_not_existing_videos(): void
    {

        $response =  $this->get('/videos/999');
        $response->assertStatus(404);
    }
}
