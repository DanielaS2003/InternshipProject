DROP TABLE IF EXISTS Weather;

CREATE TABLE Weather (
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    temperature FLOAT NOT NULL,
    weather_id INT UNIQUE NOT NULL,
);
