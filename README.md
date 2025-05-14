# DineOnCampus
Bringing smarter dining to your campus, one click at a time.

A web-based **Canteen Management System** built using **HTML, CSS, JavaScript, PHP**, and **MySQL**. This project helps streamline food ordering, management, and analytics for campus canteens.

---

## 🚀 Features

### 👨‍💼 Admin Panel
- Secure login/logout
- Dashboard with personalized welcome
- Manage food items across multiple categories:
  - Beverages
  - Tiffins
  - Meals
  - Fast Food
  - Ice Creams
- Manage users
- View placed orders
- Order analytics (payment methods, popular items, etc.)

### 🛒 User Experience
- Browse categorized food menus
- Add to cart and place orders
- Choose payment method
- Order history (optional future feature)

---

## 🗂️ Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Tools**: XAMPP / WAMP / LAMP for local server setup

---

## ⚙️ Installation & Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/DineOnCampus.git
2. Move project to your server root directory (htdocs in XAMPP).

3. Import the SQL database:

  -Open phpMyAdmin
  -Create a database named dine_on_campus
  -Import the provided .sql file

4. Configure database credentials in your PHP files (if needed):
   $conn = mysqli_connect("localhost", "root", "", "dine_on_campus");
5. http://localhost/DineOnCampus/




📊 Database Structure 
beverages, tiffins, meals, fast_food, ice_creams: Category-wise item tables
cart: Stores current user's selected items
order_items: Stores order details
orders: Finalized orders (for analytics)
users: User login information (optional)

