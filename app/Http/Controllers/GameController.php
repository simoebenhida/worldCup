<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Game;

class GameController extends Controller
{
	public function fetch() 
	{
		$client = new Client();
        $res = $client->request('GET', 'http://worldcup.sfg.io/matches/?by_date=DESC');
        return collect(json_decode($res->getBody(), true));
	}

    public function index($type = null) 
    {
        $this->fetch()->each(function($item,$key) {
        	$this->storeOrUpdate($item);
		});
		
		$game = $this->getGames($type);

        return view('games',[
        	'matches' => $game
        ]);
	}
	
	public function getGames($type = null)
	{
		switch ($type) {
			case 'now' :
				$game =  Game::isCurrent();				
				break;
			case 'yesterday' :
				$game =  Game::isYesterday();						
				break;
			case 'tomorrow' :
				$game =  Game::isTomorrow();						
				break;
			case 'today' :
				$game =  Game::isToday();				
				break;
			default :
				$game = Game::isComplete()->orCurrent();							
				break;
		}

		return $game->get()->groupby('sort_time');
		
	}

    public function data($item) : array
    {
    	return [
    		'sort_time' => Carbon::parse($item['datetime'])->format('Y-m-d'),
        	'venue' => $item['venue'],
        	'location' => $item['location'],
        	'datetime' => $item['datetime'],
        	'status' => $item['status'],
        	'time' => $item['time'],
        	'fifa_id' => $item['fifa_id'],
        	'home_team' => json_encode($item['home_team']),
        	'away_team' => json_encode($item['away_team']),
        	'home_team_events' => json_encode($item['home_team_events']) ?? null,
        	'away_team_events' => json_encode($item['away_team_events']) ?? null,
        	'home_team_statistics' => json_encode($item['home_team_statistics']) ?? null,
        	'away_team_statistics' => json_encode($item['away_team_statistics']) ?? null,
        	'winner' => $item['winner'],
        	'winner_code' => $item['winner_code'],
        	'last_event_update_at' => $item['last_event_update_at'],
        	'last_score_update_at' => $item['last_score_update_at'],
        ];
    }

    public function storeOrUpdate($item) 
    {
    	$game = Game::find($item['fifa_id']);
    	if(!is_null($game)) {
        	$game->update($this->data($item));
        }else {
        	Game::create($this->data($item));
        }
    }

}
