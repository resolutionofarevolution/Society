# 🏢 Society Management System

*A Final Year B.Sc IT Project*

---

## 📌 1. Project Overview

The **Society Management System** is a web-based application designed to simplify communication and issue management within a residential society.

It provides a centralized platform where:

* Residents can interact through posts (Feed)
* Raise complaints
* View important notices
* Admin can manage and monitor all activities

---

## 🎯 2. Objective of the Project

* Digitize society communication
* Provide transparency in complaint handling
* Create a centralized notice board
* Enable basic community interaction

---

## 👥 3. User Roles

### 🔹 Admin

* Manage notices
* View and update complaints
* Monitor activities

### 🔹 Resident

* Register/Login
* Create posts in feed
* Raise complaints
* View notices

---

## ⚙️ 4. Features

### 🟢 Authentication

* User Registration
* Login with session handling

### 🟢 Feed Module

* Residents can create posts
* View posts from others

### 🟢 Complaint Module

* Raise complaints
* Track complaint status

### 🟢 Notice Module

* Admin posts notices
* Residents can view updates

---

## 🏗️ 5. Technologies Used

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP (Apache)

---

## 🗂️ 6. Project Structure

```
SocietyManagement/
│
├── index.php              # Landing Page
├── login.php              # Login Page
├── signup.php             # Registration
│
├── dashboard.php          # Main Dashboard
│
├── api/
│   ├── add_post.php
│   ├── get_posts.php
│   ├── add_complaint.php
│   └── get_complaints.php
│
├── config/
│   └── db.php             # Database Connection
│
├── assets/
│   ├── css/
│   └── js/
│
└── database/
    └── society.sql        # Database File
```

---

## 💻 7. System Requirements

* Windows/Linux/Mac
* XAMPP installed
* Web Browser (Chrome recommended)

---

## 🚀 8. Installation & Setup Guide

Follow these steps carefully:

### ✅ Step 1: Install XAMPP

* Download XAMPP from: https://www.apachefriends.org
* Install it on your system

---

### ✅ Step 2: Start Server

* Open XAMPP Control Panel
* Start:

  * Apache ✅
  * MySQL ✅

---

### ✅ Step 3: Move Project

* Copy project folder `SocietyManagement`
* Paste inside:

```
C:\xampp\htdocs\
```

---

### ✅ Step 4: Setup Database

1. Open browser:

```
http://localhost/phpmyadmin
```

2. Create new database:

```
society_db
```

3. Import file:

```
database/society.sql
```

---

### ✅ Step 5: Configure Database

Open:

```
config/db.php
```

Update if needed:

```php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "society_db";
```

---

### ✅ Step 6: Run Project

Open browser and go to:

```
http://localhost/SocietyManagement/
```

---

## 🔄 9. How to Use the System

### 🟢 Register

* Create a new account

### 🟢 Login

* Login using credentials

### 🟢 Dashboard

After login, you can:

#### 📢 Feed

* Click "Start a Post"
* Write and submit

#### 📝 Complaint

* Submit complaint
* Track status

#### 📌 Notice

* View notices posted by admin

---

## 🧠 10. Database Tables (Basic)

### users

* id, name, email, password, role

### posts

* post_id, user_id, content, created_at

### complaints

* complaint_id, user_id, title, description, status

### notices

* notice_id, title, description, created_at

---

## ⚠️ 11. Common Issues & Fixes

### ❌ Apache not starting

* Close Skype / IIS
* Change port in XAMPP

### ❌ MySQL not starting

* Kill existing MySQL process
* Restart system

### ❌ Project not loading

* Check folder path in `htdocs`
* Verify URL

### ❌ Database error

* Check DB name in `db.php`
* Ensure import successful

---

## 📈 12. Future Enhancements

* Email notifications
* Mobile app version
* Role-based dashboards
* Real-time chat

---

## 📚 13. Conclusion

This project demonstrates:

* Full-stack web development
* CRUD operations
* Session handling
* Real-world problem solving

It is suitable as a **Final Year B.Sc IT Project** and can be extended further.

---

## 👨‍💻 Developed By

*Student Name:* ___________
*Course:* B.Sc IT
*Year:* Final Year

---

✨ *End of README*
# society-management
This project was made for final year submission
