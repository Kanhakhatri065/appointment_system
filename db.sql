/* You need to run this required SQL Queries to establish the database */
CREATE TABLE IF NOT EXISTS patients(
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    patient_city VARCHAR (255) NOT NULL,
    last_name VARCHAR(255),
    patient_email VARCHAR(255) NOT NULL,
    patient_password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS doctors(
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_username VARCHAR(255) NOT NULL,
    doctor_type VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    doctor_city VARCHAR(255) NOT NULL,
    doctor_email VARCHAR(255) NOT NULL,
    doctor_password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS slots(
    slot_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,
    FOREIGN KEY(doctor_id) REFERENCES doctors(doctor_id),
    day_of_slot VARCHAR(255) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS appointments(
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    FOREIGN KEY(patient_id) REFERENCES patients(patient_id),
    FOREIGN KEY(doctor_id) REFERENCES doctors(doctor_id),
    date_of_appointment DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews(
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    FOREIGN KEY(patient_id) REFERENCES patients(patient_id),
    FOREIGN KEY(doctor_id) REFERENCES doctors(doctor_id),
    title VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    body TEXT
);