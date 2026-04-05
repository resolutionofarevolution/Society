USE society_db;

-- =========================
-- Disable FK checks (safe truncate)
-- =========================
SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE complaint_details;
TRUNCATE TABLE news_details;
TRUNCATE TABLE notice_details;
TRUNCATE TABLE user_details;

SET FOREIGN_KEY_CHECKS = 1;

-- =========================
-- 1. INSERT USERS
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
-- 2. INSERT NOTICES
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
-- 3. INSERT NEWS
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
-- 4. INSERT COMPLAINTS
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