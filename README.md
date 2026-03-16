# medical-appointment-system
大學資料庫專題：醫療預約系統 (Medical Appointment System)
# 🏥 醫療預約系統 (Medical Appointment System)

> 這是大學資料庫專題作品，旨在建立一個高效、易用的醫療預約與管理系統。

## 📝 專案簡介
本專案開發了一個醫療預約系統，提供病患線上掛號、查詢看診進度，以及協助診所端進行排班與病歷管理的功能。主要展示了**關聯式資料庫設計 (RDBMS)**、**SQL 語法優化** 以及前後端系統整合的能力。

* **使用技術：** [請填寫你的程式語言，例如 Python / Java / PHP], MySQL, [如果有用到的框架，例如 Flask / Spring Boot]
* **開發工具：** XAMPP, phpMyAdmin / MySQL Workbench, VS Code

## ✨ 核心功能
* **病患端：** 註冊登入、線上預約掛號、取消預約、查詢看診歷史。
* **診所端：** 醫師排班管理、病患資料維護、看診進度更新。
* **資料庫：** 具備完整的正規化設計，確保資料一致性與完整性。

## 🗄️ 資料庫設計 (Database Design)
本系統的核心在於穩健的資料庫架構。以下為本系統的實體關聯圖 (ER Diagram)：

![在此放置 ER 圖截圖](你的圖片路徑)

主要資料表包含：
* `Users`: 儲存使用者帳號與加密密碼。
* `Patients`: 儲存病患基本資料。
* `Doctors`: 儲存醫師資訊與科別。
* `Appointments`: 紀錄預約時間、狀態與對應的醫病關聯。

## 📂 專案架構
```text
medical-appointment-system/
│
├── src/                      # 系統原始碼 (前端與後端程式)
│
├── database/                 # 資料庫建置檔
│   ├── 建立資料庫.sql          # 資料庫與資料表結構 (Schema)
│   └── medical_appointment_system.sql # 測試用假資料 (Dummy Data)
│
└── docs/                     # 專案文件
    ├── presentation.pdf      # 專題上台簡報
    └── report.pdf            # 完整專題報告書
