-- =========================
-- 1. CREATE DATABASE
-- =========================
CREATE DATABASE IF NOT EXISTS society_db;
USE society_db;

-- =========================
-- 2. DROP TABLES (SAFE RESET)
-- =========================
DROP TABLE IF EXISTS complaint_details;
DROP TABLE IF EXISTS news_details;
DROP TABLE IF EXISTS notice_details;
DROP TABLE IF EXISTS user_details;

-- =========================
-- 3. CREATE TABLES
-- =========================

-- USER TABLE
CREATE TABLE user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(50),
    m_name VARCHAR(50),
    l_name VARCHAR(50),
    pwd VARCHAR(255),
    uid VARCHAR(100) UNIQUE,
    prof_type INT
);

-- NOTICE TABLE
CREATE TABLE notice_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(100),
    not_head VARCHAR(255),
    not_content TEXT,
    not_topic VARCHAR(50),
    datee DATETIME
);

-- NEWS TABLE
CREATE TABLE news_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    news_head VARCHAR(255),
    news_content TEXT,
    uid VARCHAR(100),
    date DATETIME
);

-- COMPLAINT TABLE
CREATE TABLE complaint_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(100),
    comp_head VARCHAR(255),
    comp_content TEXT,
    status VARCHAR(50),
    datee DATETIME
);

-- =========================
-- 4. INSERT USERS
-- =========================

-- encrypted pwd = I2P3N4B9NtiZESDf2ihKZA==
INSERT INTO user_details
(f_name, m_name, l_name, pwd, uid, prof_type)
VALUES
('Admin', '', 'User', 'I2P3N4B9NtiZESDf2ihKZA==', 'admin@society.com', 1),
('Rahul', '', 'Sharma', 'I2P3N4B9NtiZESDf2ihKZA==', 'rahul@gmail.com', 3),
('Priya', '', 'Mehta', 'I2P3N4B9NtiZESDf2ihKZA==', 'priya@gmail.com', 3),
('Amit', '', 'Patil', 'I2P3N4B9NtiZESDf2ihKZA==', 'amit@gmail.com', 3),
('Sneha', '', 'Joshi', 'I2P3N4B9NtiZESDf2ihKZA==', 'sneha@gmail.com', 3),
('Rohit', '', 'Verma', 'I2P3N4B9NtiZESDf2ihKZA==', 'rohit@gmail.com', 3);

-- =========================
-- 5. INSERT NOTICES
-- =========================
INSERT INTO notice_details
(uid, not_head, not_content, not_topic, datee)
VALUES
('admin@society.com','Water Supply Interruption',
 'Water supply will be unavailable from 10 AM to 2 PM due to maintenance.',
 'Water', NOW()),

('admin@society.com','Lift Maintenance',
 'Lift in Wing B will be under maintenance on Sunday.',
 'Maintenance', NOW()),

('admin@society.com','Security Guidelines',
 'All visitors must register at the gate.',
 'Security', NOW()),

('admin@society.com','Monthly Meeting',
 'Society meeting on Saturday at 6 PM.',
 'General', NOW());

-- =========================
-- 6. INSERT NEWS
-- =========================
INSERT INTO news_details
(news_head, news_content, uid, date)
VALUES
('New CCTV Installed',
 'CCTV cameras installed for better security.',
 'admin@society.com', NOW()),

('Garden Renovation Done',
 'Garden area upgraded with new seating.',
 'admin@society.com', NOW()),

('Yoga Group Initiative',
 'Morning yoga group started by residents.',
 'priya@gmail.com', NOW()),

('Lost Keys Found',
 'Keys found near parking area. Contact if yours.',
 'priya@gmail.com', NOW());

-- =========================
-- 7. INSERT COMPLAINTS
-- =========================
INSERT INTO complaint_details
(uid, comp_head, comp_content, status, datee)
VALUES

('rahul@gmail.com',
 'Water Leakage',
 'Leakage in bathroom pipe since yesterday.',
 'Open', NOW()),

('priya@gmail.com',
 'Lift Issue',
 'Lift gets stuck frequently in Wing A.',
 'Open', NOW()),

('amit@gmail.com',
 'Street Light Not Working',
 'Parking area light not working.',
 'Open', NOW()),

('sneha@gmail.com',
 'Garbage Not Collected',
 'Garbage not picked up today.',
 'Open', NOW()),

('rohit@gmail.com',
 'Noise Complaint',
 'Loud noise at night from nearby flat.',
 'Open', NOW());