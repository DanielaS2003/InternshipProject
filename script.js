document.getElementById("getWeather").addEventListener("click", async () => {
  const location = document.getElementById("location").value.trim();
  const errorDiv = document.getElementById("error");
  const weatherInfoDiv = document.getElementById("weatherInfo");

  errorDiv.textContent = "";
  weatherInfoDiv.innerHTML = "";

  if (!location) {
    errorDiv.textContent = "Please enter a location!";
    return;
  }

  try {
    const response = await fetch(`http://api.weatherapi.com/v1/forecast.json?key=973742f28c5e4a7ab4a05929252701&q=${location}&days=5&aqi=no&alerts=no`);
    if (!response.ok) {
      throw new Error("Location not found.");
    }
    const data = await response.json();

    // Populate weather information
    /*weatherInfoDiv.innerHTML = `
        <h2>${data.name}</h2>
        <p>Temperature: ${data.main.temp}°C</p>
        <p>Condition: ${data.weather[0].description}</p>
        <p>Humidity: ${data.main.humidity}%</p>
        <p>Wind: ${data.wind.speed} m/s</p>
    `;*/
  } catch (error) {
    errorDiv.textContent = error.message;
  }
});
