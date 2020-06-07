<?php

namespace Tests\Unit;

use App\Channel;
use Tests\TestCase;

class ChannelsControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testListChannels()
    {

        $channels = factory(Channel::class, 3)->create()->map(function ($channel) {
            return $channel->only(['id', 'title', 'icon']);
        });

        $response = $this->call('GET', route('channels.list'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testGetInformation()
    {
        $channels = factory(Channel::class, 1)->create()->map(function ($channel) {
            return $channel->only(['id']);
        });

        $date = new \DateTime();
        $timezone = '/america/Argentina/Salta';

        $url = '/v1/channels/' . $channels->pluck('id')->first() . '/' . $date->format('Y-m-d') . $timezone;

        $this->get($url)
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testGetTimetable()
    {

        $channels = factory(Channel::class, 1)->create()->map(function ($channel) {
            return $channel->only(['id']);
        });

        $programmes = factory(\App\Programme::class, 1)->create()->map(function ($program) {
            return $program->only(['id']);
        });

        $response = $this->json('GET', '/v1/channels/' . $channels->pluck('id')->first() . '/programmes/' . $programmes->pluck('id')->first()); //route('Programme.information')

        $response->assertStatus(200);
    }
}
