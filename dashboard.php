<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <link rel="stylesheet" href="dashboard1.css">
    
</head>
<body>

    <!-- FullCalendar Container -->
    <div id='calendar'></div>

    <!-- Form to insert activity -->
    <form action="insertActivity.php" method="POST" id="activityForm">
        <label for="activityTitle">Activity Title:</label>
        <input type="text" id="activityTitle" name="activityTitle" required><br><br>

        <label for="activityDate">Activity Date (YYYY-MM-DD):</label>
        <input type="date" id="activityDate" name="activityDate" required><br><br>

        <button type="submit" id="insertActivityButton">Insert Activity</button>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2024-11-07',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        events: 'loadEvents.php', // Fetch events from the database when the page loads

        // Handle event click
        eventClick: function(info) {
            const eventTitle = info.event.title;
            const eventDate = info.event.startStr;
            const eventId = info.event.id; // You'll need an ID to edit/delete events

            // Open a dialog or form for editing/deleting
            const userChoice = confirm(`Do you want to edit or delete this event?\n\nTitle: ${eventTitle}\nDate: ${eventDate}`);
            
            if (userChoice) {
                // Redirect to edit/delete page or show a modal
                window.location.href = `eventEdit.php?id=${eventId}`;
            }
        }
    });

    calendar.render();
});

    </script>

</body>
</html>
