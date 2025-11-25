Database Design

CREATE TABLE tbl_admin (
  admin_id INT NOT NULL AUTO_INCREMENT,
  admin_username VARCHAR(50) NOT NULL UNIQUE,
  admin_password VARCHAR(255) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone_number VARCHAR(20) NOT NULL,
  PRIMARY KEY (admin_id)
);

Drop table tbl_patient;
CREATE TABLE tbl_patient (
  pat_id INT NOT NULL AUTO_INCREMENT,
  pat_name VARCHAR(50) NOT NULL,
  pat_dob DATE NOT NULL,
  pat_gender ENUM ('male', 'female', 'other') NOT NULL,
  pat_address VARCHAR(250) NOT NULL,
  pat_phone VARCHAR(20) NOT NULL,
  pat_email VARCHAR(100),
  patient_username VARCHAR(50) NOT NULL UNIQUE,
  patient_password VARCHAR(50) NOT NULL,
  date_of_registration datetime default NOW(),
  PRIMARY KEY(pat_id)
    )AUTO_INCREMENT=100;


Drop table tbl_doctor;
CREATE TABLE tbl_doctor (
  doc_id INT NOT NULL AUTO_INCREMENT,
  doc_name VARCHAR(50) NOT NULL,
  doc_gender ENUM('male', 'female', 'other') NOT NULL,
  doc_dob DATE NOT NULL,
  doc_designation VARCHAR(100) NOT NULL,
  doc_specialization smallint NOT NULL,
  doc_mobile VARCHAR(20) NOT NULL,
  doc_email VARCHAR(100),
  doc_username VARCHAR(50) NOT NULL UNIQUE,
  doc_password VARCHAR(50) NOT NULL,
  date_of_registration datetime default now(),
  PRIMARY KEY (doc_id)
) AUTO_INCREMENT=100;

Drop table tbl_appointment;
CREATE TABLE tbl_appointment (
  appoint_id INT NOT NULL AUTO_INCREMENT,
  pat_id INT NOT NULL,
  doc_id INT NOT NULL,
  start_dt_time DATETIME NOT NULL,
  end_dt_time DATETIME NOT NULL,
  appoint_reason VARCHAR(100) NOT NULL,
  appoint_status ENUM('Pending', 'Confirmed', 'Cancelled') NOT NULL,
  date_appoint_req datetime default now(),
  PRIMARY KEY (appoint_id)
) AUTO_INCREMENT=1000;


-- Look up Table for Doctor tbl_tbl_specialties
CREATE TABLE tbl_specialties (
  spec_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  spec_details VARCHAR(255) NOT NULL,
  PRIMARY KEY (spec_id)
);

-- Insert records into the tbl_specialties table
INSERT INTO tbl_specialties (spec_details) VALUES ('GENERAL PHYSICIAL/INTERNAL MEDICINE');
INSERT INTO tbl_specialties (spec_details) VALUES ('PAEDIATRICS');
INSERT INTO tbl_specialties (spec_details) VALUES ('PAEDIATRICS NEONATOLOGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('PAEDIATRIC CARDIAC SURGERY');
INSERT INTO tbl_specialties (spec_details) VALUES ('PAEDIATRIC UROLOGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('PAEDIATRIC PULMONOLGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('DERMATOLOGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('DIABETOLOGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('ENT');
INSERT INTO tbl_specialties (spec_details) VALUES ('GASTROENTEROLOGY/GI MEDICINE');
INSERT INTO tbl_specialties (spec_details) VALUES ('COLORECTAL SURGERY');
INSERT INTO tbl_specialties (spec_details) VALUES ('OBSTETRICS & GYNAECOLOGY');
INSERT INTO tbl_specialties (spec_details) VALUES ('UROGYNAECOLOGY');




//Delete From tbl_doctor;

//INSERT INTO `tbl_doctor` (`doc_id`, `doc_name`, `doc_gender`, `doc_dob`, `doc_designation`, `doc_specialization`, `doc_mobile`, `doc_email`, `doc_username`, `doc_password`, `date_of_registration`) VALUES (NULL, 'VIJAYAKUMAR', 'Male', '1972-08-02', 'MBBS FCS LONDON', '1', '9840653015', 'vijayinweb@gmail.com', 'vijay', 'password', current_timestamp());