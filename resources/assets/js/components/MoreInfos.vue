<template>
    <div @keydown.esc="modal = false">
        <a @click="modal = true" href="#" class="text-sm underline font-thin text-grey-lighter tracking-wide">More...</a>
        <div v-show="modal" class="fixed pin z-50 overflow-auto bg-smoke-light flex">
            <div class="relative p-4 bg-blue-darker w-full max-w-md m-auto flex-col flex rounded">
                <span class="absolute pin-t pin-b pin-r p-4">
                    <svg @click="modal = false" class="fill-current h-6 w-6 text-white hover:text-grey-light" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                        />
                    </svg>
                </span>
                <div>
                    <p class="py-4 text-2xl text-white font-thin border-b px-6">Statistics</p>
                    <div class="flex px-2 justify-between">
                        <div class="mt-4 border-r w-1/2">
                            <img class="h-8 block mx-auto" :src="'/img/flags/'+game.home_team.code.toLowerCase()+'.png'" alt="">
                            <div class="flex">
                                <div class="w-2/3 font-hairline text-sm py-2 text-white px-1">
                                    <p>Corners : {{ game.home_team_statistics.corners }}</p>
                                    <p>Tackles : {{ game.home_team_statistics.tackles }}</p>
                                    <p>Red cards : {{ game.home_team_statistics.red_cards }}</p>
                                    <p>Yellow cards : {{ game.home_team_statistics.yellow_cards }}</p>
                                    <p>Number passes : {{ game.home_team_statistics.num_passes }}</p>
                                    <p>Ball possession : {{ game.home_team_statistics.ball_possession }}%</p>
                                    <p>Goal Attempts : {{ game.home_team_statistics.attempts_on_goal }}</p>
                                    <p>Passes Completed : {{ game.home_team_statistics.passes_completed }}</p>
                                </div>
                                <div class="py-2 px-2 text-white">
                                    <p v-for="card in game.home_team_cards" class="flex items-center py-1 text-xs">
                                        {{ card.player }}
                                        <span v-show="card.type_of_event == 'yellow-card'" class="h-4 w-3 bg-yellow ml-1"></span>
                                        <span v-show="card.type_of_event == 'red-card'" class="h-4 w-3 bg-red ml-1"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 w-1/2">
                            <img class="h-8 block mx-auto" :src="'/img/flags/'+game.away_team.code.toLowerCase()+'.png'" alt="">
                            <div class="flex">
                                <div class="w-2/3 font-hairline text-sm py-2 text-white px-1">
                                    <p>Corners : {{ game.away_team_statistics.corners }}</p>
                                    <p>Tackles : {{ game.away_team_statistics.tackles }}</p>
                                    <p>Red cards : {{ game.away_team_statistics.red_cards }}</p>
                                    <p>Yellow cards : {{ game.away_team_statistics.yellow_cards }}</p>
                                    <p>Number passes : {{ game.away_team_statistics.num_passes }}</p>
                                    <p>Ball possession : {{ game.away_team_statistics.ball_possession }}%</p>
                                    <p>Goal Attempts : {{ game.away_team_statistics.attempts_on_goal }}</p>
                                    <p>Passes Completed : {{ game.away_team_statistics.passes_completed }}</p>
                                </div>
                                <div class="py-2 px-2 text-white">
                                    <p v-for="card in game.away_team_cards" class="flex items-center py-1 text-xs">
                                        {{ card.player }}
                                        <span v-show="card.type_of_event == 'yellow-card'" class="h-4 w-3 bg-yellow ml-1"></span>
                                        <span v-show="card.type_of_event == 'red-card'" class="h-4 w-3 bg-red ml-1"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['game'],
        data() {
            return {
                modal : false
            }
        },
    }

</script>
