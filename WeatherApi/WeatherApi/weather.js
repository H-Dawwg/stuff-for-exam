// Replace with your OpenWeatherMap API key
const apiKey = "60284e2cabd63d5eed67ba5e1fe03e23";

// Example city
const city = "London";

// API endpoint
const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

async function getWeather() {
  try {
    // Fetch weather data
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    // Parse JSON response
    const weatherData = await response.json();

    // Extract relevant data
    console.log("Weather Details:");
    console.log(`City: ${weatherData.name}`);
    console.log(`Temperature: ${weatherData.main.temp}°C`);
    console.log(`Weather: ${weatherData.weather[0].description}`);
    console.log(`Humidity: ${weatherData.main.humidity}%`);
    console.log(`Wind Speed: ${weatherData.wind.speed} m/s`);

    // Example: Display in HTML
    document.getElementById("weather").innerHTML = `
      <h2>Weather in ${weatherData.name}</h2>
      <p>Temperature: ${weatherData.main.temp}°C</p>
      <p>Weather: ${weatherData.weather[0].description}</p>
      <p>Humidity: ${weatherData.main.humidity}%</p>
      <p>Wind Speed: ${weatherData.wind.speed} m/s</p>
    `;
  } catch (error) {
    console.error("Error fetching weather data:", error);
  }
}

// Call the function
getWeather();
