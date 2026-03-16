# medical-appointment-system
大學資料庫專題：醫療預約系統 (Medical Appointment System)
# 🏥 醫療預約系統 (Medical Appointment System)

> 這是大學資料庫專題作品，旨在建立一個高效、易用的醫療預約與管理系統。

## 📝 專案簡介
本專案開發了一個醫療預約系統，提供病患線上掛號、查詢看診進度，以及協助診所端進行排班與病歷管理的功能。主要展示了**關聯式資料庫設計 (RDBMS)**、**SQL 語法優化** 以及前後端系統整合的能力。

## 🛠️ 技術標籤 (Tech Stack)
* **前端 (Frontend):** HTML5, CSS3, JavaScript (Vanilla JS)
* **後端 (Backend):** PHP
* **資料庫 (Database):** MySQL
* **開發與測試環境:** XAMPP (Apache + MariaDB), VS Code, phpMyAdmin

## ✨ 核心功能
* **病患端：** 註冊登入、線上預約掛號、取消預約、查詢看診歷史。
* **診所端：** 醫師排班管理、病患資料維護、看診進度更新。
* **資料庫：** 具備完整的正規化設計，確保資料一致性與完整性。

## 🗄️ 資料庫設計 (Database Design)
本系統的核心在於穩健的資料庫架構。以下為本系統的實體關聯圖 (ER Diagram)：

![在此放置 ER 圖截圖](你的圖片路徑)
<img width="1321" height="897" alt="螢幕擷取畫面 2026-03-17 041507" src="https://github.com/user-attachments/assets/db883f35-5730-4e3f-8041-a27894fb9808" />

主要資料表包含：
* `Users`: 儲存使用者帳號與加密密碼。
* `Patients`: 儲存病患基本資料。
* `Doctors`: 儲存醫師資訊與科別。
* `Appointments`: 紀錄預約時間、狀態與對應的醫病關聯。

## 📂 專案架構
```text
medical-appointment-system/
│
├── medical_appointment_system/         # 系統原始碼 (PHP, HTML, CSS)
│   ├── db.php                          # 資料庫連線設定檔
│   ├── index.html                      # 系統首頁
│   └── ... (其他前後端程式碼)
│
├── database/                           # 資料庫建置檔
│   ├── medical_appointment_system.sql  # 🌟 完整版資料庫 (含結構與測試資料，請匯入此檔)
│   └── 建立資料庫.sql                  # 備用檔 (僅含資料表結構，預防誤刪用)
│
└── docs/                               # 專案文件
    ├── presentation.pdf                # 專題上台簡報
    └── report.pdf                      # 完整專題報告書
```

## 🚀 如何在本地端執行 (How to Run)

本專案使用 PHP 開發，需運行於支援 PHP 的網頁伺服器（如 Apache）。以下以 XAMPP 為例說明啟動步驟：

### 1. 佈署程式碼
1. 請確保電腦已安裝並啟動 [XAMPP](https://www.apachefriends.org/)。
2. 將本專案的 `medical_appointment_system` 資料夾，完整複製到 XAMPP 的根目錄下（通常路徑為 `C:\xampp\htdocs\`）。
   * 佈署後的路徑應類似：`C:\xampp\htdocs\medical_appointment_system\`

### 2. 資料庫建置 (Database Setup)
1. 開啟 XAMPP 控制面板，啟動 **Apache** 與 **MySQL** 服務。
2. 點擊 MySQL 旁邊的 `Admin` 按鈕進入 **phpMyAdmin**（或在瀏覽器輸入 `http://localhost/phpmyadmin`）。
3. **【重要步驟】** 點擊左側「新增」，建立一個全新的資料庫，命名必須為：`medical_appointment_system`。
4. 點擊進入剛建立好的 `medical_appointment_system` 資料庫後，選擇上方的「匯入 (Import)」頁籤。
5. 選擇本專案 `database/` 資料夾下的 **`medical_appointment_system.sql` (完整版)** 進行匯入。
6. 請開啟 `medical_appointment_system/db.php`，確認裡面的資料庫連線帳號密碼與你本地端 MySQL 的設定一致（XAMPP 預設帳號通常為 `root`，密碼為空）。

### 3. 啟動系統
1. 開啟瀏覽器，輸入網址：`http://localhost/medical_appointment_system/index.html`（或對應的首頁檔名）。
2. 即可開始測試系統功能！

## 🔧 常見問題與除錯紀錄 (Troubleshooting)
在開發與環境建置過程中，若遇到以下問題可參考我的解決方案：

* **Q: 匯入 SQL 檔時遇到 `#1273 - Unknown collation: 'utf8mb4_0900_ai_ci'` 錯誤怎麼辦？**
  * **A:** 這是因為匯出與匯入的 MySQL 版本差異導致字元集不相容。解決方法是使用文字編輯器打開 SQL 檔，利用尋找與取代功能，將所有的 `utf8mb4_0900_ai_ci` 替換為 `utf8mb4_general_ci` 或是 `utf8mb4_unicode_ci`，存檔後重新匯入即可成功。
* **Q: XAMPP 的 MySQL 無法啟動，顯示 Port 3306 發生衝突 (Collision)？**
  * **A:** 這通常發生在電腦同時安裝了 XAMPP 的 MySQL 與官方獨立版 MySQL 時。解決方法是開啟 XAMPP 的 `my.ini` 設定檔，將預設的 Port `3306` 更改為 `3307`（或其他未被佔用的 Port），重新啟動 XAMPP 的 MySQL 服務即可解決衝突。

## 📸 系統畫面展示
![登入畫面截圖]
![預約掛號畫面截圖]
![後台管理畫面截圖]
