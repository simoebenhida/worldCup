<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--     <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> -->
    <title>FiFa</title>
</head>

<body class="font-sans bg-grey-lighter">
    <div class="relative flex flex-col h-12">
        <div class="fixed w-full py-3 pin-t bg-blue-darker px-6 flex items-center">
            <div class="font-black text-2xl text-white tracking-wide">
                2018 FIFA WORLD CUP RUSSIA
            </div>
        </div>
        <div class="fixed mt-10 w-auto bg-white w-full mb-8">
            <div class="container mx-auto flex items-center border-b border-white py-2">
                <div class="px-4">
                    <a href="/" class="no-underline text-blue-darker font-thin text-base hover:text-blue hover:border-blue border-transparent border-b-2 py-2 @if(is_null(last_current_url())) border-blue-light @endif">All</a>
                </div>
                <div class="px-4">
                    <a href="/now" class="no-underline text-blue-darker font-thin text-base hover:text-blue hover:border-blue border-b-2 border-transparent py-2 @if(!is_null(last_current_url()) && (last_current_url() == "
                        now ")) border-blue @endif">Now</a>
                </div>
                <div class="px-4">
                    <a href="/today" class="no-underline text-blue-darker font-thin text-base hover:text-blue hover:border-blue border-white border-b-2 py-2 @if(!is_null(last_current_url()) && (last_current_url() == "
                        today ")) border-blue @endif">Today</a>
                </div>
                <div class="px-4">
                    <a href="/tomorrow" class="no-underline text-blue-darker font-thin text-base hover:text-blue hover:border-blue border-white border-b-2 py-2 @if(!is_null(last_current_url()) && (last_current_url() == "
                        tomorrow ")) border-blue @endif">Tomorrow</a>
                </div>
                <div class="px-4">
                    <a href="/yesterday" class="no-underline text-blue-darker font-thin text-base hover:text-blue hover:border-blue border-white border-b-2 py-2 @if(!is_null(last_current_url()) && (last_current_url() == "
                        yesterday ")) border-blue @endif">Yesterday</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-10">
        <div class="border-b border-blue-darker py-6">
            <h1 class="font-bold text-3xl text-blue-darker">MATCHES</h1>
        </div>

        <div class="py-4">
            @if($matches->isEmpty())
            <div class="flex justify-center items-center text-3xl font-thin text-blue-darker">
                <p>No Match Found</p>
            </div>
            @endif @foreach($matches as $key => $match)
            <div class="flex flex-col shadow rounded mb-8">
                <div class="bg-blue-dark py-4 px-4 flex items-center justify-between">
                    <p class="font-thin text-grey-lighter tracking-wide">{{ date_format(date_create($key),'l d F' ) }}</p>
                    <!-- <a href="" class="text-sm underline font-thin text-grey-lighter tracking-wide">More...</a> -->
                </div>
                @foreach($match as $game)
                <div class="lg:flex bg-blue-darker py-4 px-2 md:px-4 border-b">
                    <div class="flex w-full lg:w-2/3 ">
                        <div class="lg:w-1/4 mb-2 py-2 flex flex-col font-hairline text-xs text-white leading-normal">
                            <!-- <span>Group A</span> -->
                            <span>{{ $game->venue }}</span>
                            <span>{{ $game->location }}</span>
                        </div>
                        <div class="w-full flex justify-center">
                            <div class="w-1/3 px-2 mb-2">
                                <div class="flex items-center">
                                    <div class="flex-1 justify-start mr-2">
                                        <p class="font-hairline text-sm md:text-lg text-white">{{ $game->home_team['country'] }}</p>
                                    </div>
                                    <div class="flex-1 justify-end">
                                        <img class="h-3 md:h-8" src="{{ " /img/flags/ ". strtolower($game->home_team['code']).".png " }}"alt="">
                                    </div>
                                </div>
                                <div class="font-hairline flex flex-col text-center py-2 text-xs text-white leading-normal tracking-wide">
                                    @foreach($game->goals_home_team as $key => $goal)
                                    <p class="flex items-center">
                                        <svg class="fill-current h-3 text-white mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"
                                            />
                                        </svg>
                                        <span class="text-white font-mono font-black mr-1">{{ $goal['time'] }}</span>
                                        <span class="text-white">{{ $goal['player'] }}</span>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="w-1/3 flex flex-col items-center mb-2">
                                <p class="font-hairline text-xs md:text-lg text-white">{{ strtoupper($game->time) }}</p>
                                <p class="font-black font-mono text-xs md:text-lg text-white">{{ $game->home_team['goals'] }} - {{ $game->away_team['goals'] }}</p>
                            </div>
                            <div class="w-1/3 px-2 mb-2">
                                <div class="flex justify-end items-center">
                                    <div class="w-1/2 justify-start mr-2">
                                        <img class="h-3 md:h-8" src="{{ " /img/flags/ ". strtolower($game->away_team['code']).".png " }}" alt="">
                                    </div>
                                    <div class="w-1/2 justify-end">
                                        <p class="font-hairline text-sm md:text-lg text-white ml-2">{{ $game->away_team['country'] }}</p>
                                    </div>
                                </div>
                                <div class="font-hairline flex flex-col text-center py-2 text-xs text-white leading-normal tracking-wide">
                                    @foreach($game->goals_away_team as $key => $goal)
                                    <p class="flex items-center">
                                        <svg class="fill-current h-3 text-white mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"
                                            />
                                        </svg>
                                        <span class="text-white font-mono font-black mr-1">{{ $goal['time'] }}</span>
                                        <span class="text-white">{{ $goal['player'] }}</span>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 px-3 flex">
                        <div class="w-1/2 text-white border-r border-indigo-light px-2">
                            <p class="font-hairline text-sm mb-1 flex items-center px-1">
                                <img class="h-3 mr-1" src="{{ " /img/flags/ ". strtolower($game->home_team['code']).".png " }}" alt=""> {{ $game->home_team['country'] }}
                            </p>
                            <ul class="px-0 font-thin text-xs flex flex-col justify-center">
                                @foreach($game->substitution_home_team as $substitution)
                                <li class="px-2 py-1 flex items-center">
                                    <span class="mr-1">{{ $substitution['time'] }} {{ $substitution['player']}}</span>
                                    @if($substitution['type_of_event'] == "substitution-out")
                                    <svg class="fill-current text-red h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 10V2h6v8h5l-8 8-8-8h5z" />
                                    </svg>
                                    @else
                                    <svg class="fill-current text-green h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 10v8h6v-8h5l-8-8-8 8h5z" />
                                    </svg>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="w-1/2 text-white px-2 ">
                            <p class="font-hairline text-sm mb-1 flex items-center">
                                <img class="h-3 mr-1" src="{{ " /img/flags/ ". strtolower($game->away_team['code']).".png " }}" alt=""> {{ $game->away_team['country'] }}
                            </p>
                            <ul class="px-0 font-thin text-xs flex flex-col justify-center">
                                @foreach($game->substitution_away_team as $substitution)
                                <li class="px-2 py-1 flex items-center">
                                    <span class="mr-1">{{ $substitution['time'] }} {{ $substitution['player']}}</span>
                                    @if($substitution['type_of_event'] == "substitution-out")
                                    <svg class="fill-current text-red h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 10V2h6v8h5l-8 8-8-8h5z" />
                                    </svg>
                                    @else
                                    <svg class="fill-current text-green h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 10v8h6v-8h5l-8-8-8 8h5z" />
                                    </svg>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="flex justify-end">
                        <a href="" class="text-sm underline font-thin text-grey-lighter tracking-wide">More...</a>
                    </div>
                </div>

                <more :game="{{ $game }}"/>

                @endforeach
            </div>
            @endforeach

        </div>
    </div>
</body>

</html>
