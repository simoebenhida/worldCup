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

    <div class="container mx-auto mt-10">
        <div class="border-b border-blue-darker py-6 px-2">
            <h1 class="font-bold text-3xl text-blue-darker">GROUPS</h1>
        </div>
        @foreach($groups as $group)
        <div class="mt-4 mb-10 flex flex-col shadow-lg text-grey-darker">
            <div class="h-12 bg-grey-light flex items-center p-2 md:p-8">
                <div class="w-1/6 md:w-1/4 text-2xl">
                    <p class="text-sm md:text-2xl">Group {{ $group['letter'] }}</p>
                </div>
                <div class="w-5/6 md:w-3/4 items-center text-center flex text-xs md:text-sm">
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Wins</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Draws</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Losses</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Games PLayed</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Goals Marked</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Goals In</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">Points</p>
                    </div>
                </div>
            </div>
            @foreach($group->teams as $team)
            <div class="flex items-center bg-white p-2 md:p-8">
                <div class="w-1/5 md:w-1/4 flex items-center">
                    <img class="h-2 md:h-8 mr-1 md:mr-3" src="{{ "/img/flags/".strtolower($team['fifa_code']).".png" }}"alt="">                
                    <p class="text-sm md:text-xl">{{ $team['country'] }}</p>
                </div>
                <div class="w-4/5 md:w-3/4 flex text-center">
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['wins'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['draws'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['losses'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['games_played'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['goals_for'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['goals_against'] }}</p>
                    </div>
                    <div class="flex-1 px-1 md:px-2">
                        <p class="text-grey-darker">{{ $team['points'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
