# Minimal Accounting Web Application

## 📌 Overview

Finance App is a lightweight accounting system designed to manage daily financial transactions with proper double-entry bookkeeping.

This project is built to demonstrate practical implementation of accounting principles such as:

* Chart of Accounts (COA)
* Opening Balance (Cut-off setup)
* Journal Entries (Auto-generated)
* Income & Expense Tracking

---

## 🚀 Features

* Chart of Accounts (COA)
* Opening Balance Setup (One-time initialization)
* Transaction Management (Income & Expense)
* Automatic Journal Generation (Double Entry)
* Basic Financial Reporting (Profit & Loss)

---

## 🧠 Key Concepts Implemented

* Double-entry accounting system
* Debit & Credit logic automation
* Ledger-based data structure
* Separation between transaction and journal layer

---

## 🛠️ Tech Stack

* Backend: Laravel
* Database: MySQL / MariaDB
* Frontend: Blade + Admin Template (Bootstrap-based)

---

## ⚙️ Installation (Local Setup)

```bash
git clone https://github.com/your-username/finance-app.git
cd finance-app

composer install
cp .env.example .env
php artisan key:generate

# Setup database in .env
php artisan migrate
php artisan db:seed --class=AccountSeeder

php artisan serve
```

---

## 🔐 Initial Setup Flow

1. Open application
2. Setup Opening Balance
3. System will:

   * Generate opening journal
   * Lock setup to prevent duplication
4. Start recording transactions

---

## 📊 System Flow

```
Setup (Opening Balance)
        ↓
Transaction Input
        ↓
Auto Journal Generation
        ↓
Financial Report
```

---

## ⚠️ Notes

* Opening balance can only be set once
* All transactions are automatically converted into journal entries
* System is designed for learning, portfolio, and small-scale usage

---

## 🔒 License

All Rights Reserved.

This project is proprietary and confidential.
Unauthorized copying, modification, distribution, or use is strictly prohibited.

---

## 📧 Contact

For inquiries or collaboration:
[c.purnomo@gmail.com](mailto:c.purnomo@gmail.com)
