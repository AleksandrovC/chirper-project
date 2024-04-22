<?php

use Livewire\Volt\Component;

new class extends Component {
    public $chartData = [];
    public $chartId;

    public function mount($chartKey)
    {
        $chartData = [
            'chart1' => [
                'name' => 'Users this week',
                'value' => [6500, 6418, 6456, 6526, 6356, 6456],
                'kpi' => '6.4k',
                'evolution' => '+2,44%',
            ],
            'chart2' => [
                'name' => 'Avrage CPC this Month',
                'value' => [2000, 4500, 2500, 3000, 4000, 3500],
                'kpi' => '$1.44',
                'evolution' => '+0,04%',
            ],
            'chart3' => [
                'name' => 'Earning per click this week',
                'value' => [800, 3500, 1000, 1100, 4000, 1300],
                'kpi' => '$128',
                'evolution' => '+0,14%',
            ],
            'chart4' => [
                'name' => 'Conversion Rate Optimization this week',
                'value' => [1500, 3500, 2000, 2500, 4000, 3000],
                'kpi' => '22%',
                'evolution' => '+12,89%',
            ],
            'chart5' => [
                'name' => 'Comission Rate',
                'value' => [3500, 1500, 2000, 2600, 1700, 1900],
                'kpi' => '+1,44',
                'evolution' => '+0,33%',
            ],
        ];
        // ];

        $this->chartData = $chartData[$chartKey];
        // $this->chartData = $chartData[$chartKey];
    }
}; ?>


<div class="w-full p-4 border shadow border-black/30 rounded-3xl bg-white/40 dark:bg-gray-800 md:p-6">
    <div class="flex justify-between">
        <div>
            <h5 class="pb-2 text-3xl font-bold leading-none text-gray-900 dark:text-white">{{ $chartData['kpi'] }}</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $chartData['name'] }}</p>
        </div>
        <div
            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            {{ $chartData['evolution'] }}
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13V1m0 0L1 5m4-4 4 4" />
            </svg>
        </div>
    </div>
    <div id="area-chart"></div>
    <div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between pt-5">
            <!-- Button -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown" data-dropdown-placement="bottom"
                class="inline-flex items-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                type="button">
                Last 7 days
                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="lastDaysdropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            7 days</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            30 days</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            90 days</a>
                    </li>
                </ul>
            </div>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-semibold text-blue-600 uppercase rounded-lg hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Users Report
                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>
</div>


@script
    <script>
        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            series: [{
                name: @json($chartData['name']),
                data: @json($chartData['value']),
                color: "#1A56DB",
            }, ],
            xaxis: {
                categories: ['01 February', '02 February', '03 February', '04 February',
                    '05 February',
                    '06 February',
                    '07 February'
                ],
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
            console.log('test');
        }
    </script>
@endscript
