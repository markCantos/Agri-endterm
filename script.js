let weather = {
    apiKey: "6d055e39ee237af35ca066f35474e9df", 
    fetchWeather: function (city) {
    fetch("https://api.openweathermap.org/data/2.5/weather?q=" + city + "&units=metric&appid=" +  this.apiKey).then((response) => {
        if (!response.ok) {
            alert("Invalid location");
            throw new Error("Invalid location");
        }
        return response.json();
        })
        .then((data) => this.displayWeather(data));
    },

    displayWeather: function (data){
    const { name } = data;
    const { icon, description } = data.weather[0];
    const { temp, humidity } = data.main;
    const { speed } = data.wind;
    document.querySelector(".city").innerText = name;
  //  document.querySelector(".icon").src ="https://openweathermap.org/img/wn/" + icon + ".png";
    document.querySelector(".description").innerText = description;
    document.querySelector(".temp").innerText = temp + "°C";
    document.querySelector(".humidity").innerText =  humidity + "%";
    document.querySelector(".wind").innerText =  speed + " km/h";
    document.querySelector(".weather").classList.remove("loading");
    document.body.style.backgroundImage = "url('https://source.unsplash.com/1600x900/?" + name + "')";

    this.displayWeatherSuggestions(temp, description.toLowerCase(), speed);
    },

    displayWeatherSuggestions: function (temp, description, windSpeed) {
        const suggestions = [];
    
        if (description.includes("clear") || description.includes("sun")) {
          suggestions.push(
            "Irrigation Management: Check soil moisture and water crops if needed. Be cautious about overwatering.",
            "Harvesting: Ideal for harvesting crops that need to be stored dry.",
            "Weed Control: Great for hoeing or applying organic weed management methods.",
            "Field Preparation: Tilling, plowing, and preparing soil for planting."
          );
        }
    
        if (description.includes("rain") || description.includes("cloud")) {
          suggestions.push(
            "Planting: Good time for planting seeds, especially in fields needing moisture.",
            "Fertilizer Application: Nutrients like nitrogen are better absorbed in moist conditions.",
            "Pest and Disease Monitoring: Check for waterborne diseases or pests that thrive in wet conditions."
          );
        }
    
        if (windSpeed > 20) {
          suggestions.push(
            "Avoid Spraying Pesticides/Fertilizers: Strong winds can cause drift, reducing effectiveness and safety.",
            "Check for Structural Damage: Ensure that crop shelters, greenhouses, or irrigation equipment are intact.",
            "Support Tall Crops: Use stakes or other supports to protect plants vulnerable to wind damage."
          );
        }
    
        if (temp <= 5) {
          suggestions.push(
            "Frost Protection: Cover sensitive plants with frost cloth or mulch.",
            "Pruning Dormant Plants: A good time to prune trees or vines.",
            "Soil Mulching: Helps retain heat and protect roots from freezing."
          );
        }
    
        if (temp >= 35) {
          suggestions.push(
            "Shade Management: Use shade nets for delicate crops.",
            "Watering: Schedule watering early in the morning or late in the afternoon to reduce evaporation.",
            "Soil Mulching: Retain moisture and regulate soil temperature."
          );
        }
    
        const suggestionsList = document.createElement("ul");
        suggestionsList.className = "weather-suggestions";
        suggestions.forEach(suggestion => {
          const li = document.createElement("li");
          li.textContent = suggestion;
          suggestionsList.appendChild(li)
        });
    
        const container = document.querySelector(".weather-suggestions-container");
        container.innerHTML = "";
        if (suggestions.length > 0) {
          const title = document.createElement("h2");
          title.textContent = "Suggestions:";
          container.appendChild(title);
          container.appendChild(suggestionsList);
        } else {
          container.textContent = "No specific agricultural recommendations for current weather.";
        }
      },
      

    search: function () {
    this.fetchWeather(document.querySelector(".search-bar").value);
    },
};


// place random temperature here
let geocode = {
    reverseGeocode: function (latitude, longitude) {
    var apikey = "90a096f90b3e4715b6f2e536d934c5af";

    var api_url = "https://api.opencagedata.com/geocode/v1/json";

    var request_url = api_url + "?" + "key=" + apikey + "&q=" + encodeURIComponent(latitude + "," + longitude) + "&pretty=1" + "&no_annotations=1";
   
    var request = new XMLHttpRequest();
    request.open("GET", request_url, true);

    request.onload = function () {
        if (request.status == 200) {
        var data = JSON.parse(request.responseText);
        weather.fetchWeather(data.results[0].components.city);
        console.log(data.results[0].components.city)
        }
        else if (request.status <= 500) {
        console.log("unable to geocode! Response code: " + request.status);
        console.log("error msg: " + data.status.message);
        } 
        else {
        console.log("server error");
        }
    };
    
    request.onerror = function () {
        console.log("unable to connect to server");
    };

    request.send();  
    },
    
    getLocation: function() {
    function success (data) {
        geocode.reverseGeocode(data.coords.latitude, data.coords.longitude);
    }
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, console.error);
    }
    else {
        weather.fetchWeather("Bacolod");
    }
    }
};

document.querySelector(".search button").addEventListener("click", function () {
    weather.search();
});

document.querySelector(".search-bar").addEventListener("keyup", function (event) {
    if (event.key == "Enter") {
        weather.search();
    }
    });

weather.fetchWeather("Bacolod");
geocode.getLocation();

// random temperator
/**
 * const temps = document.querySelectorAll(".temps");
// Select all elements with the "hams" class
const hams = document.querySelectorAll(".hams");

// Loop through all "temps" elements and assign random values
temps.forEach(temp => {
    const random = Math.floor(Math.random() * 50) + 20;
    temp.innerText = random;
});

// Loop through all "hams" elements and assign random values
hams.forEach(ham => {
    const random = Math.floor(Math.random() * 50) + 10;
    ham.innerText = random;
});

// random barometer

const random = Math.floor(Math.random()*50)+1;
document.querySelector(".baroks").innerText = random + " °C";

 * 
 */

// random temp

const days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];
        
function getRandomTemp() {
    return {
        high: Math.floor(Math.random() * (35 - 15) + 15),
        low: Math.floor(Math.random() * (15 - 5) + 5)
    };
}

function getWeatherCondition(temp) {
    if (temp >= 30) return { condition: 'Hot', icon: '☀️' };
    if (temp >= 25) return { condition: 'Sunny', icon: '🌞' };
    if (temp >= 20) return { condition: 'Partly Cloudy', icon: '⛅' };
    if (temp >= 15) return { condition: 'Cloudy', icon: '☁️' };
    if (temp >= 10) return { condition: 'Rainy', icon: '🌧️' };
    return { condition: 'Cold', icon: '❄️' };
}

function createForecast() {
    const forecastContainer = document.getElementById('forecast');
    forecastContainer.innerHTML = '';

    days.forEach((day, index) => {
        const temp = getRandomTemp();
        const weather = getWeatherCondition(temp.high);

        const dayCard = document.createElement('div');
        dayCard.className = 'day-card';
        dayCard.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;

        dayCard.innerHTML = `
            <div class="day-name">${day}</div>
            <div class="weather-icon">${weather.icon}</div>
            <div class="temperature">
                <span class="high">${temp.high}°</span>
                <span class="low">${temp.low}°</span>
            </div>
            <div class="condition">${weather.condition}</div>
        `;

        forecastContainer.appendChild(dayCard);
    });
}
// Create forecast when the page loads
createForecast();

// date
function updateDateTime() {
  const now = new Date();
  const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
  document.getElementById('date').textContent = now.toLocaleDateString('en-US', options);
}

updateDateTime();

// navbar
document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav-menu');

  hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navMenu.classList.toggle('active');
  });

  document.querySelectorAll('.nav-link').forEach(n => n.addEventListener('click', () => {
      hamburger.classList.remove('active');
      navMenu.classList.remove('active');
  }));
});
