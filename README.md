# 📊 Class Test Attainment System

🚀 The Class Test Attainment System is a web-based academic project designed to manage 
CO-wise (Course Outcome) class test marks and perform attainment analysis 
based on Outcome Based Education (OBE).

This system allows students to view their marks and enables the admin 
to analyze overall CO attainment efficiently.

## 🎯 Project Objectives

- Store PA Test marks CO-wise  
- Calculate CO-wise percentage  
- Determine attainment status (≥ 45%)  
- Provide complete CO analysis for admin  
- Implement Outcome Based Education (OBE) concept  

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

## 🛠 Technologies Used

- PHP
- MySQL
- HTML
- CSS
- XAMPP (Apache + MySQL)

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

## 🔐 Login Details

### Admin Login
- Username: admin  
- Password: admin123  

### Student Login
- Register first using Registration page  
- Login using Enrollment Number and Password  

## 📂 Project Modules
- register.php → Student Registration  
- login.php → Student Login  
- classtest.php → Select PA Test & Enter Marks  
- save_marks.php → Save CO-wise Marks  
- dashboard.php → Marks Saved Confirmation  
- admin_login.php → Admin Login  
- admin.php → Admin Panel & Attainment Analysis  

## 📌 Attainment Criteria

CO Attainment is considered:
CO Percentage ≥ 45%  → Achieved  
CO Percentage < 45%  → Not Achieved  

## 📸 Project Screenshots

### 📝 Student Registration
<img width="680" height="690" alt="Screenshot 2025-04-16 092536" src="https://github.com/user-attachments/assets/74046040-e940-4a59-9563-104e171f3172" />
<img width="680" height="690" alt="Screenshot 2025-04-16 092536" src="https://github.com/user-attachments/assets/e5dcf86e-8926-4cbc-a3dc-c0254299f3c8" />

### 🔐 Student Login
<img width="621" height="458" alt="Screenshot 2025-04-16 092955" src="https://github.com/user-attachments/assets/b15ab513-9b3c-443f-9304-6df97237d3c6" />


### 🧪 Select PA Test & CO Count

<img width="779" height="550" alt="Screenshot 2025-04-16 093250" src="https://github.com/user-attachments/assets/ad4b1aaf-23eb-4f85-8e6a-f8c991a33031" />
<img width="787" height="550" alt="Screenshot 2025-04-16 093316" src="https://github.com/user-attachments/assets/c542ebe4-ed32-4628-aea2-d5c5bafdaa7d" />
<img width="775" height="606" alt="Screenshot 2025-04-16 093355" src="https://github.com/user-attachments/assets/9f1c51ce-06b2-4ad9-a198-99720d827c25" />
<img width="1573" height="945" alt="Screenshot 2025-04-16 093649" src="https://github.com/user-attachments/assets/4b866234-268a-41a2-bea6-9f7074947269" />
<img width="620" height="219" alt="Screenshot 2025-04-16 093757" src="https://github.com/user-attachments/assets/aa6d3134-2ba7-4dbf-8855-4b8b051dcacf" />


### ✍️ Enter CO-wise Marks
![Enter CO Marks](./screenshots/enter-co-marks.png)

### ✅ Marks Submission Confirmation
![Marks Saved Successfully](./screenshots/marks-saved.png)

### 🔑 Admin Login
![Admin Login](./screenshots/admin-login.png)

### 📊 Admin Panel – Student Records & CO Attainment
![Admin Dashboard](./screenshots/admin-dashboard.png)

## 🧑‍💻 Author

Yogita Shelke  
B.Tech / Diploma in Information Technology  
Academic Project  

## 📎 Note

This project is  developed for educational purposes only and demonstrates
the implementation of Outcome Based Education (OBE) using PHP and MySQL.
