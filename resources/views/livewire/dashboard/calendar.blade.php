<div class="flex items-center justify-center ">
    <div class="w-full max-w-sm p-4 border shadow-lg border-black/30 rounded-3xl">
        <div class="flex items-center justify-between mb-3">
            <span tabindex="0" id="current-month-year"
                class="ml-4 text-lg font-bold text-gray-800 focus:outline-none dark:text-gray-100">
                October 2020
            </span>
            <div class="flex items-center">
                <button id="prev-month" aria-label="calendar backward"
                    class="text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </button>
                <button id="next-month" aria-label="calendar forward"
                    class="ml-3 text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </button>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Mo</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Tu</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                We</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Th</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Fr</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Sa</p>
                        </div>
                    </th>
                    <th>
                        <div class="flex justify-center w-full">
                            <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                Su</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="calendar-body">
                <!-- calendar days are generated here -->
            </tbody>
        </table>

        <div class="px-5 py-5 rounded-b md:py-8 md:px-16 dark:bg-gray-700">
            <div class="px-4 tasks-container"> <!-- Add the tasks-container class here -->
                <!-- Tasks will be rendered here -->
            </div>
        </div>

        <style>
            .js-selected-date {
                position: relative;
                color: white;
                z-index: 1;
            }

            .js-selected-date::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 30px;
                height: 30px;
                background-color: black;
                border-radius: 50%;
                z-index: -1;
            }
        </style>
    </div>

    <script>
        (function() {
            const calendarBody = document.getElementById('calendar-body');
            const prevMonthButton = document.getElementById('prev-month');
            const nextMonthButton = document.getElementById('next-month');
            const currentMonthYearElement = document.getElementById("current-month-year");
            const tasksContainer = document.querySelector('.tasks-container');

            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();
            let selectedDateCell = null;

            const monthNames = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            function updateCurrentMonthYear(year, month) {
                currentMonthYearElement.textContent = monthNames[month] + " " + year;
            }

            function generateCalendar(year, month) {
                calendarBody.innerHTML = '';
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const startDay = (new Date(year, month, 1)).getDay() - 1;
                let currentDay = 1;

                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');
                    row.classList.add('h-7');

                    for (let j = 0; j < 7; j++) {
                        if (i === 0 && j < startDay) {
                            const cell = createCalendarCell('');
                            row.appendChild(cell);
                        } else if (currentDay <= daysInMonth) {
                            const cell = createCalendarCell(currentDay);
                            row.appendChild(cell);

                            if (isToday(year, month, currentDay)) {
                                selectedDateCell = cell;
                                selectedDateCell.classList.add('js-selected-date');
                                updateTasks(new Date(year, month, currentDay));
                            }
                            currentDay++;
                        }
                    }
                    calendarBody.appendChild(row);
                }
                updateCurrentMonthYear(currentYear, currentMonth);
            }

            function createCalendarCell(day) {
                const cell = document.createElement('td');
                cell.textContent = day;
                cell.classList.add('text-center', 'cursor-pointer');

                cell.addEventListener('click', function() {
                    if (selectedDateCell !== null) {
                        selectedDateCell.classList.remove('js-selected-date');
                    }
                    selectedDateCell = cell;
                    selectedDateCell.classList.add('js-selected-date');

                    const year = currentYear;
                    const month = currentMonth;
                    const day = parseInt(cell.textContent);

                    updateTasks(new Date(year, month, day))
                });

                return cell;
            }

            function changeMonth(direction) {
                if (direction === 'next') {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                } else {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                }
                updateCurrentMonthYear(currentYear, currentMonth);
                generateCalendar(currentYear, currentMonth);
            }

            function isToday(year, month, day) {
                const currentDate = new Date();
                return year === currentDate.getFullYear() &&
                    month === currentDate.getMonth() &&
                    day === currentDate.getDate();
            }

            nextMonthButton.addEventListener('click', () => changeMonth('next'));
            prevMonthButton.addEventListener('click', () => changeMonth('prev'));

            generateCalendar(currentYear, currentMonth);

            function updateTasks(selectedDate) {
                tasksContainer.innerHTML = '';

                let tasks = [];
                if (selectedDate.getDate() === 1) {
                    tasks = [{
                            time: '9:00 AM',
                            title: 'Zoom call with design team',
                            description: 'Discussion on UX sprint and Wireframe review'
                        },
                        {
                            time: '10:00 AM',
                            title: 'Orientation session with new hires',
                            description: ''
                        },
                        {
                            time: '11:00 AM',
                            title: 'Team meeting',
                            description: 'Agenda: Project updates'
                        }
                    ];
                } else if (selectedDate.getDate() === 15) {
                    tasks = [{
                            time: '9:00 AM',
                            title: 'Client meeting',
                            description: 'Presentation of project proposal'
                        },
                        {
                            time: '1:00 PM',
                            title: 'Development sprint planning',
                            description: 'Sprint backlog grooming'
                        }
                    ];
                } else {
                    tasks = [{
                        time: '⚡No tasks scheduled for this date 👉try 1st or 15th of April ',
                        title: '',
                        description: ''
                    }];
                }

                // Render tasks
                tasks.forEach(task => {
                    const taskDiv = document.createElement('div');
                    taskDiv.classList.add('task');
                    taskDiv.innerHTML = `
                <div class="pb-4 border-b border-gray-400 border-dashed">
                    <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">${task.time}</p>
                    <a tabindex="0" class="mt-2 text-lg font-medium leading-5 text-gray-800 focus:outline-none dark:text-gray-100">${task.title}</a>
                    <p class="pt-2 text-sm leading-4 text-gray-600 dark:text-gray-300">${task.description}</p>
                </div>
            `;
                    tasksContainer.appendChild(taskDiv);
                });
            }
        })();
    </script>
</div>
