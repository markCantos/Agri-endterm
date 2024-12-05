<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <link rel="stylesheet" href="dashboard1.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
   
    <title>DASHBOARD</title>
</head>     
<body>
<main>
    <div class="news-section">
    
      <div class="latest-news-box"> 
         <img src="icons/thunder-unscreen.gif">
          <p> LATEST NEWS</p></div>
      <div class="slider" style="
                   --width: 800px;
                   --height: 40px;
                   --quantity: 4  ;
                   background-color: #E9EFEC;
    ">
        <div class="list">
        <div class="item" style="--position: 1">Mt. Kanlaon Activity Increases: Authorities Urge Residents and Farmers to Stay Vigilant</div>
        <div class="item" style="--position: 2"></div>
        <div class="item" style="--position: 3">Increased Soil Acidity Observed in Negros Occidental Sugarcane Fields Following Volcanic Ashfall from Mt. Kanlaon</div>
        <div class="item" style="--position: 4"></div>
        <div class="item" style="--position: 5">Philippine Agriculture Struggles Amid Climate Challenges: Heavy Rains in Mindanao Threaten Crop Yields</div>
        <div class="item" style="--position: 6"></div>
        <div class="item" style="--position: 7">Strong Typhoons Expected to Test the Resilience of Filipino Farmers as Rainy Season Continues</div>
        <div class="item" style="--position: 8"></div>
        <div class="item" style="--position: 9">Mt. Kanlaon Eruption Causes Over ₱104 Million in Agricultural Losses Local Farmers Face Challenges </div>
        <div class="item" style="--position: 10"></div>

      </div>
      </div>
    </div>
    <div class="slider" style="
              --width: 200px;
              --quantity: 11;
    ">
    </div>
  </main>
  <nav class="navbar">
    <div class="navbar-container">
        <div class="logo">
            <img src="icons/logo(1)(1).png" alt="AGRI Logo" class="logo-img">
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">ABOUT US</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link">ACCOUNT</a>
                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-link">Profile</a></li>
                    <li><a href="#" class="dropdown-link">Settings</a></li>
                    <li><a href="login.php" class="dropdown-link">Log Out</a></li>
                </ul>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>

<hr>
  <div class="overall">
    <div class="wrapper">
        <div class="weather-container">
            <div class="container">
                <div class="search">
                    <input type="text" class="search-bar" placeholder="Enter City">
                    <button class="button1">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg" margin-top="220px">
                        <path
                          d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
                        </path>
                      </svg>
                      </button>
                  </div>
            </div>
        </div>
            <div class="three-specs">
                <div class="one-two-threes">
                    <div class="weather loading">
                      <div class="location">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="city">New York</span>
                    </div>
                        <div class="description">Cloudy</div>
                        <div class="group">
                          <div class="temp"></div>
                          <div class="date" id="date">Sunday | 12 Dec 2024</div>
                        </div>
                      </div>
                </div>
    
                <div class="one-two-three">
                    <div class="icon">
                        <img src="icons/50d.png" alt="">
                        <div class="winds"> <h3> Wind</h3></div>
                    </div>
                    <div class="wrap"> <h3 class="wind">38</h3></div>
                    
                    <div class="humiditys">
                        <img src="icons/humidity.svg" alt="">
                        <div class="name"> <h3> humidity</h3></div>
                    </div>
                    <div class="wrap"> <h3 class="humidity">38</h3></div>
                </div>
    
                <div class="one-two-three">
                    <div class="Barometer">
                        <img src="icons/481430.png" alt="">
                        <span class="desc"> Barometer</span>
                    </div>
                    <h3 class="baroks">25.02°C</h3>
                    <div class="graph-container">
                        <svg class="wave-line" viewBox="0 0 100 20" preserveAspectRatio="none">
                          <path d="M0,10 Q25,5 50,10 T100,10" fill="none" stroke="black" stroke-width="1"/>
                        </svg>
                        <div class="data-points">
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">23.5</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">22.9</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">22.3</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">22.8</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">22.9</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">23.3</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">23.2</div>
                          </div>
                          <div class="data-point">
                            <div class="icon">💧</div>
                            <div class="value">22.3</div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="forecast-container" id="forecast"></div>       
    </div>
    <div class="weather-suggestions-container"></div>
</div>









    <div class="container">
        <!-- FullCalendar -->
        <div id="calendar"></div>

        <!-- Button to Open Add Event Modal -->
        <button id="addEventButton">Add Activity</button>

        <!-- Modal for Adding Events -->
        <div id="addEventModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeAddModal">&times;</span>
                <h2>Add New Activity</h2>
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

    <footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <img src="icons/logo.png" alt="AGRI Logo" class="logo">
    <div class="footer-description">
      <p>
        To empower farmers with accurate, timely weather information and crop management tools 
        that enable them to make data-driven decisions, optimize planting and harvesting schedules, 
        reduce risks associated with extreme weather, and enhance productivity and sustainability 
        across their farms.
      </p>
    </div>
    <div class="footer-contact">
      <p>
        📞 (034) 475-6372 or (034) 475-NEPC
      </p>
      <div class="footer-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2024 AGRI CORP. All rights reserved</p>
  </div>
</footer>

<script src="script.js"></script>
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
                initialDate: '2024-12-07',
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
                            alert(data); 
                            calendar.refetchEvents(); 
                            editEventModal.style.display = 'none'; 
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
                                alert(data); 
                                calendar.refetchEvents(); 
                                editEventModal.style.display = 'none'; 
                            });
                        }
                    };
                }
            });

            calendar.render();

            
            addEventButton.onclick = function () {
                addEventModal.style.display = 'block';
            };

            
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
                    alert(data); 
                    calendar.refetchEvents(); 
                    addEventModal.style.display = 'none'; 
                });
            };
        });
    </script>  
</body>
</html>
