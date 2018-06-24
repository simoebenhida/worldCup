<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>FiFa</title>

        <!-- FACEBOOK -->
    <meta property="og:title" content="2018 FIFA World Cup Russia™  - Matches - FIFA.com">
    <meta property="og:description" content="2018 FIFA World Cup Russia™  - Matches">
    <meta property="og:locale" content="en-GB">
    <meta property="og:site_name" content="www.fifa.com">
    <meta property="og:url" content="https://www.fifa.com/worldcup/matches/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://img.fifa.com/assets/img/tournaments/17/2018/common/og_image.jpg">
    <meta property="og:image:type" content="png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- TWITTER -->
    <meta name="twitter:title" content="2018 FIFA World Cup Russia™  - Matches - FIFA.com">
    <meta name="twitter:description" content="2018 FIFA World Cup Russia™  - Matches">
    <meta name="twitter:image" content="https://img.fifa.com/assets/img/tournaments/17/2018/common/og_image.jpg">
    <meta name="twitter:image:src" content="https://img.fifa.com/assets/img/tournaments/17/2018/common/og_image.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fifacom">
    <meta name="twitter:creator" content="@fifacom">
    <meta name="twitter:domain" content="www.fifa.com">
</head>

<body class="font-dusha">
    @include('navbar')    

    <div class="fixed w-auto bg-white w-full mb-8 border-b-2 border-grey-lighter -mt-1">
            <div class="container mx-auto flex items-center py-2">
                <div class="px-4">
                    <a href="/" class="no-underline text-blue-darker font-thin text-sm md:text-base hover:text-blue hover:border-blue border-transparent border-b-2 py-2 
                        @if(is_null(last_current_url())) border-blue-darker @endif">
                        All
                    </a>
                </div>
                <div class="px-4">
                    <a href="/now" class="no-underline text-blue-darker font-thin text-sm md:text-base hover:text-blue hover:border-blue border-b-2 border-transparent py-2 
                        @if(last_current_url() === "now") border-blue-darker @endif">
                        Now
                    </a>
                </div>
                <div class="px-4">
                    <a href="/today" class="no-underline text-blue-darker font-thin text-sm md:text-base hover:text-blue hover:border-blue border-b-2 border-transparent py-2 
                        @if(last_current_url() === "today") border-blue-darker @endif">Today</a>
                </div>
                <div class="px-4">
                    <a href="/tomorrow" class="no-underline text-blue-darker font-thin text-sm md:text-base hover:text-blue hover:border-blue border-b-2 border-transparent py-2 
                        @if(last_current_url() === "tomorrow") border-blue-darker @endif">Tomorrow</a>
                </div>
                <div class="px-4">
                    <a href="/yesterday" class="no-underline text-blue-darker font-thin text-sm md:text-base hover:text-blue hover:border-blue border-b-2 border-transparent py-2 
                        @if(last_current_url() === "yesterday") border-blue-darker @endif">Yesterday</a>
                </div>
            </div>
    </div>

    
    
    
    
    <div class="container mx-auto mt-10" id="app">
        <div class="border-b border-blue-darker py-6 px-2">
            <h1 class="font-bold text-3xl text-blue-darker">MATCHES</h1>
        </div>

        <div class="py-4">
            @if($matches->isEmpty())
            <div class="flex justify-center items-center text-3xl font-thin text-blue-darker">
                <p>No Match Found</p>
            </div>
            @endif @foreach($matches as $key => $match)
            <div class="flex flex-col shadow rounded mb-8">
                <div class="bg-grey-light py-4 px-4 flex items-center justify-between">
                    <p class="font-thin text-grey-darker tracking-wide">{{ date_format(date_create($key),'l d F' ) }}</p>
                    <!-- <a href="" class="text-sm underline font-thin text-grey-lighter tracking-wide">More...</a> -->
                </div>
                @foreach($match as $game)
                <div class="bg-white py-4 px-2 md:px-4 border-b-4 border-grey">
                    <div class="lg:flex">
                        <div class="lg:flex w-full @if($game->status !== 'future') lg:w-2/3 @else @endif lg:w-full">
                            <div class="lg:w-1/4 mb-2 py-2 flex flex-col font-hairline text-sm text-grey-darker leading-normal">
                                <!-- <span>Group A</span> -->
                                <div class="flex flex-col text-center">
                                    <span>{{ $game->venue }}</span>
                                    <span>{{ $game->location }}</span>
                                    <span>Time : {{ $game->hour }}</span>
                                </div>
                                <div class="mt-2">
                                    <img src="{{ asset('img/stadium/'.str_slug($game->location,'_').'.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="w-full flex justify-center">
                                <div class="w-1/3 px-2 mb-2">
                                    <div class="flex items-center">
                                        <div class="w-1/2 justify-start mr-2">
                                            <p class="font-hairline text-sm md:text-lg text-grey-darker">{{ $game->home_team['country'] }}</p>
                                        </div>
                                        <div class="w-1/2 justify-end">
                                            <img class="h-3 md:h-8" src="{{ "/img/flags/".strtolower($game->home_team['code']).".png" }}"alt="">
                                        </div>
                                    </div>
                                    <div class="font-hairline flex flex-col text-center py-2 text-sm text-grey-darker leading-normal tracking-wide">
                                        @foreach($game->goals_home_team as $key => $goal)
                                        <p class="flex items-center">
                                            <svg class="fill-current h-3 text-grey-darker mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"
                                                />
                                            </svg>
                                            <span class="text-grey-darker font-mono font-black mr-1">{{ $goal['time'] }}</span>
                                            <span class="text-grey-darker">{{ $goal['player'] }}</span>
                                        </p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="w-1/4 flex flex-col items-center mb-2">
                                @if($game->status !== 'future')
                                    <p class="font-hairline text-sm md:text-lg text-grey-darker">{{ strtoupper($game->time) }}</p>
                                    <p class="font-black font-mono text-sm md:text-lg text-grey-darker">{{ $game->home_team['goals'] }} - {{ $game->away_team['goals'] }}</p>
                                @endif
                                </div>
                                <div class="w-1/3 md:px-2 mb-2">
                                    <div class="flex items-center">
                                        <div class="w-1/2 justify-start mr-2">
                                            <img class="h-3 md:h-8 block" src="{{ "/img/flags/".strtolower($game->away_team['code']).".png" }}" alt="">
                                        </div>
                                        <div class="1-/2 justify-end inline-block">
                                            <p class="font-hairline text-sm md:text-lg text-grey-darker ml-2">{{ $game->away_team['country'] }}</p>
                                        </div>
                                    </div>
                                    <div class="font-hairline flex flex-col text-center py-2 text-sm text-grey-darker leading-normal tracking-wide">
                                        @foreach($game->goals_away_team as $key => $goal)
                                        <p class="flex items-center">
                                            <svg class="fill-current h-3 text-grey-darker mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"
                                                />
                                            </svg>
                                            <span class="text-grey-darker font-mono font-black mr-1">{{ $goal['time'] }}</span>
                                            <span class="text-grey-darker">{{ $goal['player'] }}</span>
                                        </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($game->status !== 'future')                        
                        <div class="w-full lg:w-1/2 px-3 flex">
                            <div class="w-1/2 text-grey-darker border-r border-indigo-light px-2">
                                <p class="font-hairline text-sm mb-1 flex items-center px-1">
                                    <img class="h-3 mr-1" src="{{ "/img/flags/".strtolower($game->home_team['code']).".png" }}" alt=""> {{ $game->home_team['country'] }}
                                </p>
                                <ul class="px-0 font-thin text-sm flex flex-col justify-center">
                                    @foreach($game->substitution_home_team as $substitution)
                                    <li class="px-2 py-1 flex items-center">
                                        <span class="mr-1 w-3/4">{{ $substitution['time'] }} {{ $substitution['player']}}</span>
                                        @if($substitution['type_of_event'] == "substitution-out")
                                        <svg class="w-1/4 fill-current text-red h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10V2h6v8h5l-8 8-8-8h5z" />
                                        </svg>
                                        @else
                                        <svg class="w-1/4 fill-current text-green h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10v8h6v-8h5l-8-8-8 8h5z" />
                                        </svg>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="w-1/2 text-grey-darker px-2 ">
                                <p class="font-hairline text-sm mb-1 flex items-center">
                                    <img class="h-3 mr-1" src="{{ "/img/flags/".strtolower($game->away_team['code']).".png" }}" alt=""> {{ $game->away_team['country'] }}
                                </p>
                                <ul class="px-0 font-thin text-sm flex flex-col justify-center">
                                    @foreach($game->substitution_away_team as $substitution)
                                    <li class="px-2 py-1 flex items-center">
                                        <span class="w-3/4 mr-1">{{ $substitution['time'] }} {{ $substitution['player']}}</span>
                                        @if($substitution['type_of_event'] == "substitution-out")
                                        <svg class="w-1/4 fill-current text-red h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10V2h6v8h5l-8 8-8-8h5z" />
                                        </svg>
                                        @else
                                        <svg class="w-1/4 fill-current text-green h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10v8h6v-8h5l-8-8-8 8h5z" />
                                        </svg>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        @endif
                    </div>
                    @if($game->status !== 'future')
                    <div class="flex justify-end">
                        <more :game="{{ $game }}"/>                        
                    </div>
                    @endif
                </div>


                @endforeach
            </div>
            @endforeach

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
