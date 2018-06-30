<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Game extends Model
{
    protected $guarded = [];
    
    protected $appends = [
        'goals_home_team',
        'goals_away_team',
        'substitution_away_team',
        'substitution_home_team',
        'hour',
        'home_team_cards',
        'away_team_cards'
    ];

    public function getKeyName()
    {
        return 'fifa_id';
    }

    public function scopeIsComplete($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeOrCurrent($query)
    {
        return $query->orWhere('status', 'in progress');
    }

    public function scopeIsCurrent($query)
    {
        return $query->where('status', 'in progress');
    }

    public function scopeIsFuture($query)
    {
        return $query->where('status', 'future');
    }

    public function scopeIsToday($query)
    {
        return $query->whereDate('sort_time', now()->format('Y-m-d'));
    }

    public function scopeIsTomorrow($query)
    {
        return $query->whereDate('sort_time', now()->addDay()->format('Y-m-d'));
    }

    public function scopeIsYesterday($query)
    {
        return $query->whereDate('sort_time', now()->subDay()->format('Y-m-d'));
    }

    public function getHomeTeamAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getAwayTeamAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getHourAttribute()
    {
        return Carbon::parse($this->datetime)->format('H:i');
    }

    public function getHomeTeamStatisticsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getAwayTeamStatisticsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getGoalsHomeTeamAttribute()
    {
        return collect(json_decode($this->home_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'goal' || $item['type_of_event'] == 'goal-penalty';
        })->merge(collect(json_decode($this->away_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'goal-own';
        }));
    }

    public function getGoalsAwayTeamAttribute()
    {
        return collect(json_decode($this->away_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'goal' || $item['type_of_event'] == 'goal-penalty';
        })->merge(collect(json_decode($this->home_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'goal-own';
        }));
    }

    public function getSubstitutionAwayTeamAttribute()
    {
        return collect(json_decode($this->away_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'substitution-out' || $item['type_of_event'] == 'substitution-in';
        });
    }
    
    public function getSubstitutionHomeTeamAttribute()
    {
        return collect(json_decode($this->home_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'substitution-out' || $item['type_of_event'] == 'substitution-in';
        });
    }

    public function getHomeTeamCardsAttribute()
    {
        return collect(json_decode($this->home_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'yellow-card' ||  $item['type_of_event'] == 'red-card';
        });
    }
    
    public function getAwayTeamCardsAttribute()
    {
        return collect(json_decode($this->away_team_events, true))->filter(function ($item) {
            return $item['type_of_event'] == 'yellow-card' ||  $item['type_of_event'] == 'red-card';
        });
    }
}
