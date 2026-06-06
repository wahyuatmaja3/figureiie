---

# # Figureiie

---

## 📖 About

**Figureiie** is a web-based marketplace built with Laravel that allows users to buy and sell anime figures from various series, franchises, and manufacturers.

The platform provides a modern shopping experience with product catalog browsing, shopping cart management, order processing, and seller management features. Whether you're a casual collector or a serious anime enthusiast, Figureiie helps you discover and trade anime figures safely and conveniently.

---

## ✨ Features

### 👤 User Features

* **Authentication:** Secure user registration, login, and password management.
* **Catalog Browsing:** Advanced search, multi-criteria filtering, and detailed product pages.
* **Shopping Experience:** Fully functional shopping cart, wishlist, and streamlined checkout process.
* **History & Feedback:** Comprehensive order history with product reviews and ratings.

### 🛍 Seller Features

* **Dashboard:** Analytical insights on sales, revenue, and active listings.
* **Inventory Management:** Easy creation, update, and deletion of figure listings.
* **Media Handling:** Multi-image uploads for figure galleries.
* **Order Processing:** Track and manage incoming orders from buyers.

### 🛠 Admin Features

* **User Control:** Manage and moderate user/seller accounts.
* **Verification System:** Process and verify seller applications.
* **Product Moderation:** Review and approve product listings to prevent spam.
* **Platform Overview:** Global analytics, category management, and order monitoring.

---

## 📦 Product Information

### Supported Categories

* 🌟 Scale Figures
* 🎁 Prize Figures
* 🧸 Nendoroid & Figma
* 🚀 Pop Up Parade
* ⚔️ Action Figures & Resin Statues

### Metadata Attributes

Every listing captures precise details: *Anime Series, Character Name, Manufacturer, Scale, Material, Condition (New/BIB/Loose), Price, and Stock Availability.*

---

## 🚀 Tech Stack

| Backend | Frontend | Tools |
| --- | --- | --- |
| Core: **Laravel 10+** / **PHP 8.2+** | Templating: **Blade Templates** | Package Managers: **Composer**, **NPM** |
| Database: **MySQL** / **MariaDB** | Styling: **Tailwind CSS** / **Bootstrap** | Environment: **Laravel Artisan** |

---

## 📋 Requirements

Ensure your local development environment meets the following specifications:

* **PHP** $\ge$ 8.2
* **Composer** $\ge$ 2.0
* **Node.js** $\ge$ 18.x & **NPM**
* **MySQL** $\ge$ 8.0

---

## ⚙ Installation & Setup

Follow these steps to spin up the project locally:

### 1. Clone & Install Dependencies

```bash
# Clone the repository
git clone https://github.com/wahyuatmaja3/figureiie.git
cd figureiie

# Install Composer & NPM dependencies
composer install
npm install

```

### 2. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

```

Open your `.env` file and configure your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=figureiie
DB_USERNAME=root
DB_PASSWORD=your_password

```

### 3. Database & Assets Compilation

```bash
# Run migrations and seed data
php artisan migrate --seed

# Compile frontend assets
npm run build

```

### 4. Serve the Application

```bash
php artisan serve

```

Visit the local server at: [http://localhost:8000](https://www.google.com/search?q=http://localhost:8000)

---

## 📂 Project Structure

```text
app/
├── Http/             # Controllers, Middleware, Requests
├── Models/           # Eloquent Models
└── Services/         # Business Logic Layer

database/
├── migrations/       # Database Schemas
└── seeders/          # Dummy Data Seeders

resources/
├── views/            # Blade Templates
├── js/               # JavaScript Components
└── css/              # Stylesheets (Tailwind/Bootstrap)

routes/
├── web.php           # Web Routes
└── api.php           # API Endpoints

```

---

## 🔒 Security Implementations

* **CSRF Protection:** Tokens enforced on all state-changing requests.
* **Data Security:** Strict password hashing using Bcrypt/Argon2.
* **Access Control:** Route protection via Authentication Middleware and fine-grained Authorization Policies.
* **Data Integrity:** Strict Form Request validation rules.

---

## 📸 Screenshots

| Home Page | Product Detail |
| --- | --- |
|  |  |
| **Shopping Cart** | **Seller Dashboard** |
|  |  |

---

## 🛣 Roadmap

### MVP (Minimum Viable Product)

* [x] Secure Authentication & User Profiles
* [x] Dynamic Product Catalog & Filtering
* [x] Shopping Cart & Checkout Flow
* [x] Basic Seller Dashboard & Order Tracking

### Future Enhancements

* [ ] **Payment Gateway:** Integration with Midtrans.
* [ ] **Logistics:** Automated shipping cost calculation via RajaOngkir API.
* [ ] **Communication:** Real-time Live Chat between buyers and sellers.
* [ ] **Gamification:** Live Auction System for rare figures.
* [ ] **Intelligence:** AI-powered Figure Search (by Image) & Recommendation Engine.

---

## 🤝 Contributing

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

---

## 👨‍💻 Author

**Wahyu Tri Atmaja**

* GitHub: [@wahyuatmaja3](https://github.com/wahyuatmaja3)
* LinkedIn: [Your LinkedIn (Optional)]

---
