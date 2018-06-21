<template>
    <div class="fixed pin z-50 overflow-auto bg-smoke-light flex">
        <div class="relative p-4 bg-white w-full max-w-md m-auto flex-col flex">
            <span class="absolute pin-t pin-b pin-r p-4">
                <svg class="h-6 w-6 text-grey hover:text-grey-darkest" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                    />
                </svg>
            </span>
            <div>
                <p class="py-4 text-lg font-thin border-b">Statistics</p>
                <div class="flex px-2 justify-between">
                    <div class="text-center mt-4">
                        <img class="h-8" src="{{ " /img/flags/ ". strtolower($game->away_team['code']).".png " }}" alt="">
                        <div class="flex">
                            <div class="font-hairline text-center text-sm py-2 text-grey-darker px-1">
                                <p>Corners : 7</p>
                                <p>Tackles : 8</p>
                                <p>Red cards : 0</p>
                                <p>Number passes : 387</p>
                                <p>Ball possession : 47 %</p>
                                <p>Goal Attempts : 12</p>
                                <p>Passes Completed : 282</p>
                            </div>
                            <div class="py-2 px-2 text-sm text-grey-darker">
                                <p class="flex items-center py-1">
                                    player name
                                    <span class="h-4 w-3 bg-yellow ml-1"></span>
                                </p>
                                <p class="flex items-center py-1">
                                    player name
                                    <span class="h-4 w-3 bg-red ml-1"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <img class="h-8" src="{{ " /img/flags/ ". strtolower($game->away_team['code']).".png " }}" alt="">
                        <div class="flex">
                            <div class="font-hairline text-center text-sm py-2 text-grey-darker px-1">
                                <p>Corners : 7</p>
                                <p>Tackles : 8</p>
                                <p>Red cards : 0</p>
                                <p>Number passes : 387</p>
                                <p>Ball possession : 47 %</p>
                                <p>Goal Attempts : 12</p>
                                <p>Passes Completed : 282</p>
                            </div>
                            <div class="py-2 px-2 text-sm text-grey-darker">
                                <p class="flex items-center py-1">
                                    player name
                                    <span class="h-4 w-3 bg-yellow ml-1"></span>
                                </p>
                                <p class="flex items-center py-1">
                                    player name
                                    <span class="h-4 w-3 bg-red ml-1"></span>
                                </p>
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
    props : ['game'],
}
</script>

