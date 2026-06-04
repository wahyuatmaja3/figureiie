# Figureiie

<p align="center">
  <img src="public/logo.png" width="150" alt="Figureiie Logo">
</p>

<p align="center">
  <b>Anime Figure Marketplace Platform</b><br>
  Buy, sell, and collect your favorite anime figures in one place.
</p>

---

## 📖 About

Figureiie is a web-based marketplace built with Laravel that allows users to buy and sell anime figures from various series, franchises, and manufacturers.

The platform provides a modern shopping experience with product catalog browsing, shopping cart management, order processing, and seller management features.

Whether you're a casual collector or a serious anime enthusiast, Figureiie helps you discover and trade anime figures safely and conveniently.

---

## ✨ Features

### 👤 User Features

- User registration & authentication
- User profile management
- Browse anime figure catalog
- Search and filter products
- Product detail pages
- Shopping cart
- Wishlist
- Checkout process
- Order history
- Product reviews & ratings

### 🛍 Seller Features

- Seller dashboard
- Create product listings
- Manage inventory
- Upload product images
- Order management
- Sales analytics

### 🛠 Admin Features

- User management
- Seller verification
- Product moderation
- Category management
- Order monitoring
- Platform analytics

---

## 📦 Product Information

Each figure listing can contain:

- Product name
- Anime series
- Character name
- Manufacturer
- Scale
- Material
- Condition
- Price
- Stock availability
- Product gallery
- Description

Example categories:

- Scale Figures
- Prize Figures
- Nendoroid
- Figma
- Pop Up Parade
- Action Figures
- Resin Statues

---

## 🚀 Tech Stack

### Backend

- Laravel
- PHP 8+
- MySQL

### Frontend

- Blade Templates
- Bootstrap / Tailwind CSS
- JavaScript

### Development Tools

- Composer
- NPM
- Laravel Artisan

---

## 📋 Requirements

Before installing, make sure your environment contains:

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js >= 18
- NPM

---

## ⚙ Installation

Clone repository:

```bash
git clone https://github.com/wahyuatmaja3/figureiie.git

cd figureiie
```

Install dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database inside `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=figureiie
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

(Optional) Run seeders:

```bash
php artisan db:seed
```

Build frontend assets:

```bash
npm run build
```

Run development server:

```bash
php artisan serve
```

Open:

```text
http://localhost:8000
```

---

## 📂 Project Structure

```text
app/
├── Http/
├── Models/
├── Services/

database/
├── migrations/
├── seeders/

resources/
├── views/
├── js/
├── css/

routes/
├── web.php
├── api.php
```

---

## 🗄 Database Overview

Core tables:

- users
- sellers
- products
- categories
- product_images
- carts
- cart_items
- orders
- order_items
- reviews
- wishlists

---

## 🔒 Security

- CSRF Protection
- Password Hashing
- Authentication Middleware
- Authorization Policies
- Input Validation

---

## 📸 Screenshots

### Home Page

![Home](docs/screenshots/home.png)

### Product Detail

![Product Detail](docs/screenshots/product-detail.png)

### Shopping Cart

![Cart](docs/screenshots/cart.png)

### Seller Dashboard

![Dashboard](docs/screenshots/dashboard.png)

---

## 🛣 Roadmap

### MVP

- [x] Authentication
- [x] Product Catalog
- [x] Shopping Cart
- [x] Checkout
- [x] Order Management

### Future Features

- [ ] Payment Gateway Integration
- [ ] Midtrans Support
- [ ] RajaOngkir Shipping
- [ ] Seller Verification
- [ ] Live Chat
- [ ] Auction System
- [ ] Mobile Application
- [ ] Recommendation Engine
- [ ] AI Figure Search

---

## 🤝 Contributing

Contributions are welcome.

1. Fork repository
2. Create feature branch

```bash
git checkout -b feature/new-feature
```

3. Commit changes

```bash
git commit -m "Add new feature"
```

4. Push branch

```bash
git push origin feature/new-feature
```

5. Open Pull Request

---

## 📄 License

This project is licensed under the MIT License.

---

## 👨‍💻 Author

**Wahyu Tri Atmaja**

GitHub:
https://github.com/wahyuatmaja3

---

<p align="center">
  Made with ❤️ for Anime Figure Collectors
</p>
