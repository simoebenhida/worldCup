<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;
use Carbon\Carbon;

class FetchGamesByDate extends TestCase
{
	public $url = 'http://worldcup.sfg.io/matches';
    /** @test */
    public function fetch_games() 
    {
        $client = new Client();
        $res = $client->request('GET', 'http://worldcup.sfg.io/matches/?by_date=DESC');
        $data = collect(json_decode($res->getBody(), true));
        $group = collect();
        // $data = $data->map(function($item,$value){
        // 	// $item['datetime'] = Carbon::parse($item['datetime'])->toDateTimeString();
        // 	$item = collect($item);
        // 	$item->put('sorted_data',Carbon::parse($item['datetime'])->format('Y-m-d'));
        // 	return $item;
        // })->groupBy('sorted_data');
        // $data = $data->groupBy('datetime');
        dd($data);
    }
}
