
# Laravel 9 E‑Commerce

An e‑commerce platform built with **Laravel 9**, featuring a modern storefront, admin panel, and accompanying YouTube video series.

## 🎥 Video Tutorial (English)

Follow the full walkthrough via YouTube playlist:  
https://www.youtube.com/playlist?list=PLIUezwWmVtFWEsExpVODS0NhbeWxjxVta

## 🌟 Features

- 🛍️ Product listing with search, filter, and pagination  
- 🧑‍💻 Shopping cart and checkout integration  
- 🔐 User authentication & registration  
- ⚙️ Admin dashboard: product, category & order management  
- 🌐 Multi-language support (if included—adjust as needed)  
- 💵 Optional: Stripe / PayPal integration (if available)  
- Modern layouts using Blade templating + Tailwind CSS

## 🛠️ Tech Stack

- Laravel 9 framework  
- PHP 8.x  
- Blade & Tailwind CSS  
- MySQL / MariaDB (configured via `.env`)  
- Laravel features: Eloquent, Middleware, Policies, Validation  
- Webpack mix for asset compilation

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/celikyuksell/Laravel9-Ecommerce.git
   cd Laravel9-Ecommerce
   ```
2. **Install PHP dependencies**
   ```bash
   composer install
   ```
3. **Install front-end dependencies**
   ```bash
   npm install
   ```
4. **Configure environment**
   Copy `.env.example` to `.env` and update:
   ```dotenv
   DB_CONNECTION=mysql
   DB_DATABASE=your_db
   DB_USERNAME=your_user
   DB_PASSWORD=your_pass
   ```
5. **Generate application key**
   ```bash
   php artisan key:generate
   ```
6. **Run migrations**
   ```bash
   php artisan migrate
   ```
7. **Compile assets**
   ```bash
   npm run dev
   ```
8. **Run the local server**
   ```bash
   php artisan serve
   ```
   Open: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 👤 Author

Created by **Yuksel Celik** ([@celikyuksell](https://github.com/celikyuksell)).  
Watch the full tutorial at: https://www.youtube.com/c/YukselCELIK
