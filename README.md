# 🏥 醫療預約系統 (Medical Appointment System)

> 這是大學資料庫專題作品，旨在建立一個高效、易用的醫療預約與管理系統。
>
> 🎥 **系統實際操作展示：** [點擊觀看 Demo 影片](https://drive.google.com/file/d/1ucOWfk9kDfsf2TVapyZe8J_Vfbj7iiff/view?usp=drive_link)

## 📝 專案簡介
本專案開發了一個醫療預約系統，提供病患線上掛號、查詢看診進度，以及協助診所端進行排班與病歷管理的功能。主要展示了**關聯式資料庫設計 (RDBMS)**、**SQL 語法優化** 以及前後端系統整合的能力。

## 🛠️ 技術標籤 (Tech Stack)
* **前端 (Frontend):** HTML5, CSS3, JavaScript (Vanilla JS)
* **後端 (Backend):** PHP
* **資料庫 (Database):** MySQL
* **開發與測試環境:** XAMPP (Apache + MariaDB), VS Code, phpMyAdmin

## ✨ 核心功能
* **病患端：** 註冊登入、線上預約掛號、取消預約、查詢看診歷史。
* **診所端（醫師/管理員）：** 醫師排班管理、看診進度更新、每日預約數量統計。
* **資料庫：** 具備完整的正規化設計（符合 3NF），確保資料一致性與完整性。

## 🗄️ 資料庫設計 (Database Design)
本系統的核心在於穩健的資料庫架構。以下為本系統的實體關聯圖 (ER Diagram)：
<div align="center">
  <img width="800" alt="螢幕擷取畫面 2026-03-17 041507" src="https://github.com/user-attachments/assets/d2c5afdf-d899-4b01-ac50-3556e535970a" />
</div>

系統透過角色區分機制（Role-based），精簡實體並提升查詢效率，主要由以下四張資料表構成：
* `users` (使用者): 儲存所有使用者（包含病患、醫師與管理員）的基本資料與登入權限，透過 `role` 欄位區分身分。
* `doctors` (醫師資訊): 儲存醫師專屬資訊（如科別 `specialty` 與簡介 `bio`），並透過 Foreign Key 與 `users` 表關聯。
* `schedules` (排班表): 記錄醫師的排班日期、開始與結束時間，以及可預約狀態。
* `appointments` (預約資料): 紀錄實際的預約時間與狀態，並作為橋樑串連病患 (對應 `users`)、醫師 (`doctors`) 與排班 (`schedules`)。

## 📂 專案架構
```text
medical-appointment-system/
│
├── medical_appointment_system/         # 系統原始碼 (PHP, HTML, CSS)
│   ├── db.php                          # 資料庫連線設定檔
│   ├── index.html                      # 系統首頁 (一般使用者入口)
│   ├── login.html, login.php           # 登入介面與後端身分驗證邏輯
│   ├── style.css                       # 全域共用樣式表
│   ├── doctor-*.html                   # 醫師端前端介面 (包含 dashboard, schedule, edit 等)
│   ├── appointment-*.html              # 病患端前端介面 (包含 status, check 等)
│   └── *.php                           # 負責與資料庫互動的 API 邏輯 (如 get_appointments.php, submit_appointment.php 等)
│
├── database/                           # 資料庫建置檔
│   ├── medical_appointment_system.sql  # 完整版資料庫 (含結構與測試資料，請匯入此檔)
│   └── 建立資料庫.sql                   # 備用檔 (僅含資料表結構，預防誤刪用)
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

## 📸 系統畫面展示 (Screenshots)

### 🔑 共通功能
> 系統具備角色權限驗證機制，依據登入身分自動導向對應的專屬後台。

#### 系統登入畫面
<div align="center">
  <img width="800" alt="登入頁面" src="https://github.com/user-attachments/assets/e89af774-69b0-4ef8-aa10-462646372c3f" />
</div>

### 👤 一般使用者端 (Patient Interface)

<table width="100%">
  <tr>
    <th width="50%">功能特色</th>
    <th width="50%">畫面展示</th>
  </tr>
  <tr>
    <td valign="top">
      <b>1. 系統登入 (需登入)</b><br><br>
      病患專屬的登入介面，驗證身分後方可使用掛號等核心功能。<br><br>
      💡 <i>帳號：user25@example.com</i><br>
      🔑 <i>密碼：pass123</i>
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/e89af774-69b0-4ef8-aa10-462646372c3f" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>2. 查詢醫師班表 (免登入開放功能)</b><br><br>
      任何人皆可於系統首頁直接瀏覽各醫師的門診時間與當前預約狀態，方便快速查看空檔。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/549cc943-db38-47b1-8351-3fcc4c7b41e5" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>3. 查詢預約狀態 (登入後預設首頁)</b><br><br>
      病患登入後會自動跳轉至此頁面，可即時追蹤所有掛號紀錄的處理狀態（如 pending, confirmed），並可執行取消預約。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/c8030278-2804-46d1-8290-30a8e3ee38c2" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>4. 線上預約功能</b><br><br>
      系統的核心功能。病患可在此選單中，選擇指定的醫師與時段進行線上掛號。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/52325a67-0cd9-4b6a-99db-40dd3473a49b" width="100%">
    </td>
  </tr>
</table>

### 👨‍⚕️ 醫師端功能 (Doctor Dashboard)

<table width="100%">
  <tr>
    <th width="50%">功能特色</th>
    <th width="50%">畫面展示</th>
  </tr>
  <tr>
    <td valign="top">
      <b>1. 系統登入 (醫師端)</b><br><br>
      醫師專屬的登入介面，系統會依據權限自動導向醫師後台。<br><br>
      💡 <i>帳號：user02@example.com</i><br>
      🔑 <i>密碼：pass123</i>
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/0f7bfd37-c011-4ef2-b69e-58c2a6e56c63" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>2. 醫師專屬後台首頁</b><br><br>
      醫師登入後自動進入專屬管理介面，顯示個人基本資料與專屬導覽列。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/73fc28a8-92d6-4039-9c26-b3e74952336e" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>3. 查詢預約人數</b><br><br>
      醫師可指定特定日期與門診時段，即時掌握該診次的總預約病患人數，利於看診前準備。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/6f99b118-bf2e-4096-aaf4-8009bde4116f" width="100%">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <b>4. 修改班表與時段管理</b><br><br>
      賦予醫師彈性排班的權限，可在此新增、修改或關閉自己的可預約時間，系統將即時同步至前端班表。
    </td>
    <td valign="top">
      <img src="https://github.com/user-attachments/assets/73c55a63-d661-4953-908b-a23e3abfd462" width="100%">
    </td>
  </tr>
</table>
