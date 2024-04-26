<x-app-layout>
    <div class="py-12" x-data="{ contentLoaded: false }">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="col-span-1 mx-2 md:col-span-2">
                    <div x-data="{ selectedChart: 'chart1' }" class="flex flex-col ">


                        <div class ="col-span-2 overflow-hidden ">
                            <template x-if="selectedChart === 'chart1'">
                                @livewire('dashboard.chart', ['chartKey' => 'chart1'], key('chart1'))

                            </template>

                            <template x-if="selectedChart === 'chart2'">
                                @livewire('dashboard.chart', ['chartKey' => 'chart2'], key('chart2'))
                            </template>

                            <template x-if="selectedChart === 'chart3'">
                                @livewire('dashboard.chart', ['chartKey' => 'chart3'], key('chart3'))
                            </template>

                            <template x-if="selectedChart === 'chart4'">
                                @livewire('dashboard.chart', ['chartKey' => 'chart4'], key('chart4'))
                            </template>

                            <template x-if="selectedChart === 'chart5'">
                                @livewire('dashboard.chart', ['chartKey' => 'chart5'], key('chart5'))
                            </template>
                        </div>

                        <div class="flex flex-wrap items-center col-span-1 gap-1 mt-2 whitespace-nowrap break-keep">
                            <button x-on:click="selectedChart = 'chart1';"
                                class="flex shadow-md  mb-2 justify-center font-semibold px-4 py-1.5 border border-black/30 rounded-full transition duration-300 ease-in-out hover:bg-black hover:text-white"
                                :class="{ 'bg-black/90 text-white': selectedChart === 'chart1', 'bg-black/5': selectedChart !== 'chart1' }">🌱New
                                Users</button>
                            <button x-on:click="selectedChart = 'chart2';"
                                class="flex shadow-md mb-2  justify-center px-4 py-1.5 border border-black/30 rounded-full transition duration-300 ease-in-out hover:bg-black hover:text-white"
                                :class="{ 'bg-black/90 text-white': selectedChart === 'chart2', 'bg-black/5': selectedChart !== 'chart2' }">💰CPC
                                Cost</button>
                            <button x-on:click="selectedChart = 'chart3';"
                                class="flex shadow-md mb-2  justify-center px-4 py-1.5 border border-black/30 rounded-full transition duration-300 ease-in-out hover:bg-black hover:text-white"
                                :class="{ 'bg-black/90 text-white': selectedChart === 'chart3', 'bg-black/5': selectedChart !== 'chart3' }">📈Earnings
                                Per
                                Click</button>
                            <button x-on:click="selectedChart = 'chart4';"
                                class="flex shadow-md mb-2  justify-center px-4 py-1.5 border border-black/30 rounded-full transition duration-300 ease-in-out hover:bg-black hover:text-white"
                                :class="{ 'bg-black/90 text-white': selectedChart === 'chart4', 'bg-black/5': selectedChart !== 'chart4' }">🛠️CRO</button>
                            {{-- Commission Structure Comparison --}}
                            <button x-on:click="selectedChart = 'chart5'"
                                class="flex shadow-md mb-2  justify-center px-4 py-1.5 border border-black/30 rounded-full transition duration-300 ease-in-out hover:bg-black hover:text-white"
                                :class="{ 'bg-black/90  text-white': selectedChart === 'chart5', 'bg-black/5': selectedChart !== 'chart5' }">🤝Commission
                                Rate</button>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-between mt-8">
                        <div class="flex flex-col w-full px-2 mb-4 sm:w-1/2 md:w-1/4">
                            <div class="flex flex-col p-4 py-6 bg-white rounded-lg">

                                <div
                                    class="flex items-center justify-center w-10 h-10 p-2 mb-4 bg-blue-100 rounded-full">
                                    <i class="text-blue-400 fa-solid fa-chart-pie"></i>
                                </div>
                                <span class="uppercase text-md text-neutral-400">
                                    campaigns started
                                </span>
                                <span class="text-[28px] mt-4">
                                    27
                                </span>
                                <span class="text-sm text-red-600">
                                    -12%
                                </span>
                            </div>

                        </div>

                        <div class="flex flex-col w-full px-2 mb-4 sm:w-1/2 md:w-1/4">
                            <div class="flex flex-col p-4 py-6 bg-white rounded-lg">
                                <div
                                    class="flex items-center justify-center w-10 h-10 p-2 mb-4 bg-red-100 rounded-full">
                                    <i class="text-red-400 fa-solid fa-fire-flame-curved"></i>
                                </div>
                                <span class="uppercase text-md text-neutral-400">
                                    new campaigns
                                    assigned </span>
                                <span class="text-[28px] mt-4">
                                    6
                                </span>
                                <span class="text-sm text-green-600">
                                    +2%
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col w-full px-2 mb-4 sm:w-1/2 md:w-1/4">
                            <div class="flex flex-col p-4 py-6 bg-white rounded-lg">

                                <div
                                    class="flex items-center justify-center w-10 h-10 p-2 mb-4 bg-green-100 rounded-full">
                                    <i class="text-green-400 fa-solid fa-flag"></i>
                                </div>
                                <span class="uppercase text-md text-neutral-400">
                                    objectives completed

                                </span>
                                <span class="text-[28px] mt-4">
                                    45
                                </span>
                                <span class="text-sm text-green-600">
                                    +2%
                                </span>
                            </div>

                        </div>

                        <div class="flex flex-col w-full px-2 mb-4 sm:w-1/2 md:w-1/4">
                            <div class="flex flex-col p-4 py-6 bg-white rounded-lg">

                                <div
                                    class="flex items-center justify-center w-10 h-10 p-2 mb-4 bg-purple-100 rounded-full">
                                    <i class="text-purple-400 fa-solid fa-chart-line"></i>
                                </div>
                                <span class="uppercase text-md text-neutral-400">
                                    campaigns completed
                                </span>
                                <span class="text-[28px] mt-4">
                                    61%
                                </span>
                                <span class="text-sm text-red-600">
                                    -2%
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class="p-4 pt-0 overflow-hidden">
                        <livewire:dashboard.calendar />
                    </div>

                </div>
            </div>
        </div>
        <script>
            window.Alpine.nextTick(() => {
                document.querySelector('[x-data="{ contentLoaded: false }"]').setAttribute('x-data',
                    '{ contentLoaded: true }');
            });
        </script>
    </div>
</x-app-layout>
