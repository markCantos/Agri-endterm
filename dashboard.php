<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <link rel="stylesheet" href="dashboard1.css">
    <title>Calendar with Event Modal</title>
</head>
<body>

    <div class="container">
        <!-- FullCalendar -->
        <div id="calendar"></div>

        <!-- Button to Open Add Event Modal -->
        <button id="addEventButton">Add Event</button>

        <!-- Modal for Adding Events -->
        <div id="addEventModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeAddModal">&times;</span>
                <h2>Add New Event</h2>
                <form id="addEventForm">
                    <label for="newEventTitle">Title:</label>
                    <input type="text" id="newEventTitle" name="title" required><br><br>

                    <label for="newEventDate">Date:</label>
                    <input type="date" id="newEventDate" name="date" required><br><br>

                    <button type="button" id="saveEventButton">Save Event</button>
                </form>
            </div>
        </div>

        <!-- Modal for Editing or Deleting Events -->
        <div id="editEventModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Edit or Delete Event</h2>
                <form id="editEventForm">
                    <label for="modalTitle">Title:</label>
                    <input type="text" id="modalTitle" name="title" required><br><br>

                    <label for="modalDate">Date:</label>
                    <input type="date" id="modalDate" name="date" required><br><br>

                    <div class="modal-buttons">
                        <button type="button" id="updateEventButton">Update</button>
                        <button type="button" id="deleteEventButton" class="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var addEventModal = document.getElementById('addEventModal');
            var editEventModal = document.getElementById('editEventModal');
            var closeModal = document.getElementById('closeModal');
            var closeAddModal = document.getElementById('closeAddModal');
            var addEventButton = document.getElementById('addEventButton');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2024-11-07',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                events: 'loadEvents.php', // Fetch events from the database

                // Handle event click
                eventClick: function (info) {
                    // Open edit modal
                    editEventModal.style.display = 'block';

                    // Populate modal with event data
                    document.getElementById('modalTitle').value = info.event.title;
                    document.getElementById('modalDate').value = info.event.startStr;

                    // Update event logic
                    document.getElementById('updateEventButton').onclick = function () {
                        var updatedTitle = document.getElementById('modalTitle').value;
                        var updatedDate = document.getElementById('modalDate').value;

                        fetch('updateEvent.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                id: info.event.id,
                                title: updatedTitle,
                                date: updatedDate
                            })
                        })
                        .then(response => response.text())
                        .then(data => {
                            alert(data); // Show success message
                            calendar.refetchEvents(); // Refresh events
                            editEventModal.style.display = 'none'; // Close modal
                        });
                    };

                    // Delete event logic
                    document.getElementById('deleteEventButton').onclick = function () {
                        if (confirm('Are you sure you want to delete this event?')) {
                            fetch('deleteEvent.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ id: info.event.id })
                            })
                            .then(response => response.text())
                            .then(data => {
                                alert(data); // Show success message
                                calendar.refetchEvents(); // Refresh events
                                editEventModal.style.display = 'none'; // Close modal
                            });
                        }
                    };
                }
            });

            calendar.render();

            // Open Add Event Modal
            addEventButton.onclick = function () {
                addEventModal.style.display = 'block';
            };

            // Close Modals
            closeModal.onclick = function () {
                editEventModal.style.display = 'none';
            };

            closeAddModal.onclick = function () {
                addEventModal.style.display = 'none';
            };

            window.onclick = function (event) {
                if (event.target == addEventModal) {
                    addEventModal.style.display = 'none';
                }
                if (event.target == editEventModal) {
                    editEventModal.style.display = 'none';
                }
            };

            // Save New Event
            document.getElementById('saveEventButton').onclick = function () {
                var newEventTitle = document.getElementById('newEventTitle').value;
                var newEventDate = document.getElementById('newEventDate').value;

                fetch('insertActivity.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        title: newEventTitle,
                        date: newEventDate
                    })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show success message
                    calendar.refetchEvents(); // Refresh events
                    addEventModal.style.display = 'none'; // Close modal
                });
            };
        });

    </script>

    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        #addEventButton {
            margin: 10px 0;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #addEventButton:hover {
            background-color: #45a049;
        }
    </style>
</body>
</html>
