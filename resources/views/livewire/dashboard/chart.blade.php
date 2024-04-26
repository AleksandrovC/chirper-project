<?php

use Livewire\Volt\Component;

new class extends Component {
    public $chartData = [];

    public function mount($chartKey)
    {
        $chartData = [
            'chart1' => [
                'name' => 'Users this week',
                'value' => [6500, 6418, 6456, 6526, 6356, 6456],
                'kpi' => '6.4k',
                'evolution' => '+2,44%',
                'details' => [
                    'button_text' => 'New Users Insights',
                    'title' => '🚀 New Users Overview',
                    'title_paragraph' => 'Understanding the influx of new users is crucial for business growth. It indicates the effectiveness of marketing strategies in attracting potential customers to your platform.',
                    'subtitle' => '📊 Engagement Metrics',
                    'subtitle_paragraph' => 'Engagement metrics provide insights into user interactions with your platform. Analyzing engagement patterns helps refine user experience, leading to increased retention and customer satisfaction.',
                ],
            ],
            'chart2' => [
                'name' => 'Avrage CPC this Month',
                'value' => [2000, 4500, 2500, 3000, 4000, 3500],
                'kpi' => '$1.44',
                'evolution' => '+0,04%',
                'details' => [
                    'button_text' => 'CPC Costs Insights',
                    'title' => '💡 Average CPC Analysis',
                    'title_paragraph' => 'Monitoring the average cost per click (CPC) is essential for managing advertising expenses effectively. It enables businesses to optimize ad campaigns and allocate budgets efficiently.',
                    'subtitle' => '📈 Performance Metrics',
                    'subtitle_paragraph' => 'Performance metrics associated with CPC offer valuable insights into the effectiveness of advertising efforts. Analyzing these metrics guides decision-making processes and ensures optimal return on investment (ROI).',
                ],
            ],
            'chart3' => [
                'name' => 'Earning per click this week',
                'value' => [800, 3500, 1000, 1100, 4000, 1300],
                'kpi' => '$128',
                'evolution' => '+0,14%',
                'details' => [
                    'button_text' => 'Earnings per Click Insights',
                    'title' => '💼 Earnings per Click Insights',
                    'title_paragraph' => 'Understanding earnings generated per click is vital for assessing the profitability of advertising campaigns. It helps businesses measure the effectiveness of monetization strategies and identify opportunities for revenue optimization.',
                    'subtitle' => '💰 Monetization Analysis',
                    'subtitle_paragraph' => 'Monetization analysis provides insights into revenue generation mechanisms and their impact on earnings per click. Analyzing monetization strategies enables businesses to maximize revenue streams and improve overall financial performance.',
                ],
            ],
            'chart4' => [
                'name' => 'Conversion Rate Optimization this week',
                'value' => [1500, 3500, 2000, 2500, 4000, 3000],
                'kpi' => '22%',
                'evolution' => '+12,89%',
                'details' => [
                    'button_text' => 'CRO Analysis',
                    'title' => '🛠 Conversion Rate Optimization (CRO)',
                    'title_paragraph' => 'Optimizing conversion rates is fundamental for driving business growth and maximizing sales opportunities. It involves analyzing user behavior and implementing strategies to enhance conversion rates across various touchpoints.',
                    'subtitle' => '📊 Performance Metrics',
                    'subtitle_paragraph' => 'Performance metrics associated with conversion rate optimization offer insights into the effectiveness of conversion strategies. Analyzing these metrics helps businesses identify conversion bottlenecks and implement targeted improvements to increase conversion rates.',
                ],
            ],
            'chart5' => [
                'name' => 'Comission Rate',
                'value' => [3500, 1500, 2000, 2600, 1700, 1900],
                'kpi' => '+1,44',
                'evolution' => '+0,33%',
                'details' => [
                    'button_text' => 'Commission Rate Insights',
                    'title' => '💰 Commission Rate Analysis',
                    'title_paragraph' => 'Analyzing commission rates is important for assessing the financial impact of partnership agreements and affiliate programs. It helps businesses evaluate the profitability of commission-based revenue models and optimize commission structures.',
                    'subtitle' => '📈 Financial Performance',
                    'subtitle_paragraph' => 'Commission rates play a significant role in determining the financial performance of businesses operating on commission-based models. Monitoring commission rates enables businesses to manage expenses, improve profit margins, and achieve sustainable growth.',
                ],
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

            <span
                class="inline-flex items-center ml-2 text-sm font-medium text-center text-gray-400 dark:text-gray-400 dark:hover:text-white">
                Last 30 days
            </span>

            <div x-data="{ open: false }" @click.away="open = false">
                <!-- Pop-up -->
                <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg" @click.away="open = false">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-3xl font-bold text-blue-800">{{ $chartData['details']['title'] }}</h2>
                            <button @click="open = false" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mb-6 border-b border-gray-300"></div>
                        <div class="mb-8 text-lg text-gray-700">
                            <p class="text-gray-500 text"> {{ $chartData['details']['title_paragraph'] }}</p>
                            <h4 class="mt-2 mb-2 text-lg font-bold">{{ $chartData['details']['subtitle'] }}</h4>
                            <p class="text-gray-500 "> {{ $chartData['details']['subtitle_paragraph'] }}</p>


                        </div>
                        <button @click="open = false"
                            class="w-full px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Close</button>
                    </div>
                </div>

                <!-- Link to open pop-up -->
                <a @click="open = true" href="#"
                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-blue-600 uppercase rounded-lg hover:text-blue-700 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    {{ $chartData['details']['button_text'] }}
                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </div>
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
