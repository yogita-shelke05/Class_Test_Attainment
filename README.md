# 📊 Class Test Attainment System

🚀 The Class Test Attainment System is a web-based academic project designed to manage 
CO-wise (Course Outcome) class test marks and perform attainment analysis 
based on Outcome Based Education (OBE).

This system allows students to view their marks and enables the admin 
to analyze overall CO attainment efficiently.

---

## 🎯 Project Objectives

- Store PA Test marks CO-wise  
- Calculate CO-wise percentage  
- Determine attainment status (≥ 45%)  
- Provide complete CO analysis for admin  
- Implement Outcome Based Education (OBE) concept  

---

## ✨ Features

### 👨‍🎓 Student Module
- Student Registration
- Student Login
- Select PA Test (PA Test 1 / PA Test 2)
- Select Number of COs
- Enter CO-wise Marks
- View Submission Confirmation

### 👩‍💼 Admin Module
- Admin Login
- View All Student Records
- CO-wise Attainment Analysis
- Average Percentage Calculation
- Attainment Status (Yes / No)
- Highest & Lowest CO Performance
- Overall Attainment Summary

---

## 🛠 Technologies Used

- PHP
- MySQL
- HTML
- CSS
- XAMPP (Apache + MySQL)

---

## ⚙️ How to Run the Project

1. Install XAMPP  
2. Copy the project folder into:
   C:\xampp\htdocs\class_test_attainment

3. Start Apache and MySQL from XAMPP Control Panel  
4. Open phpMyAdmin  
5. Create a new database  
6. Import the provided SQL file  
7. Open browser and visit:
   http://localhost/class_test_attainment

---

## 🔐 Login Details

### Admin Login
- Username: admin  
- Password: admin123  

### Student Login
- Register first using Registration page  
- Login using Enrollment Number and Password  

---

## 📂 Project Modules

- register.php → Student Registration  
- login.php → Student Login  
- classtest.php → Select PA Test & Enter Marks  
- save_marks.php → Save CO-wise Marks  
- dashboard.php → Marks Saved Confirmation  
- admin_login.php → Admin Login  
- admin.php → Admin Panel & Attainment Analysis  

---

## 📌 Attainment Criteria

CO Attainment is considered:

CO Percentage ≥ 45%  → Achieved  
CO Percentage < 45%  → Not Achieved  

---

## 📸 Project Screenshots

### 📝 Student Registration
![Student Registration](./screenshots/student-registration.png)

### 🔐 Student Login
![Student Login](./screenshots/student-login.png)

### 🧪 Select PA Test & CO Count
![Select PA Test](./screenshots/select-pa-test.png)
![Select CO Count](./screenshots/select-co-count.png)

### ✍️ Enter CO-wise Marks
![Enter CO Marks](./screenshots/enter-co-marks.png)

### ✅ Marks Submission Confirmation
![Marks Saved Successfully](./screenshots/marks-saved.png)

### 🔑 Admin Login
![Admin Login](./screenshots/admin-login.png)

### 📊 Admin Panel – Student Records & CO Attainment
![Admin Dashboard](./screenshots/admin-dashboard.png)

---

## 🧑‍💻 Author

Yogita Shelke  
B.Tech / Diploma in Information Technology  
Academic Project  

---

## 📎 Note

This project is developed for educational purposes only and demonstrates
the implementation of Outcome Based Education (OBE) using PHP and MySQL.
