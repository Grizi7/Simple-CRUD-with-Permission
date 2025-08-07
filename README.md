# 🚀 Simple CRUD with Permission System

A modern, robust Laravel application demonstrating CRUD operations with role-based permission system. Built with Laravel 11, featuring user authentication, admin management, product management, and comprehensive access control with wishlist notifications.

## ✨ Features

✅ **Admin Authentication** - Complete auth system with Laravel Breeze
✅ **User Authentication** - Complete auth system with Laravel Sanctum
🛡️ **Role-based Permissions** - Admin and User roles with [`UserTypeEnum`](app/Enums/UserTypeEnum.php)
✍️ **Product Management** - Full CRUD operations for products with factory seeding
👥 **Admin Management** - Comprehensive admin user management system
🔐 **Permission Guards** - Route-level access control with authorization gates
📧 **Email Notifications** - Wishlist update notifications via [`WishlistUpdateNotification`](app/Notifications/WishlistUpdateNotification.php)
📊 **Dashboard Interface** - Clean, responsive dashboard with navigation
🎯 **Clean Architecture** - Organized with Services, Traits, and Enums

## 🌐 Deployment

🚀 **Live Demo**: [https://grizi7.space/](https://grizi7.space/)
🔗 **Base API URL**: [https://grizi7.space/api](https://grizi7.space/api)

## 📋 Requirements

* PHP >= 8.2
* Laravel 11.x
* SQLite (included) / MySQL / MariaDB
* Composer
* Node.js & NPM (for asset compilation)

## 💾 Installation

```bash
# Clone the repository
git clone https://github.com/Grizi7/Simple-CRUD-with-Permission.git

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Database is already configured with SQLite
# The database.sqlite file is included in database/

# Run migrations and seeders
php artisan migrate --seed

# Compile assets
npm run build

# Serve the application
php artisan serve
```

## 🗃️ Project Structure

```
Simple-CRUD-with-Permission/
├── app/
│   ├── Enums/
│   │   └── UserTypeEnum.php
│   ├── Http/Controllers/
│   │   ├── Auth/
|   |   ├── Admin/
|   |   └── Api/
│   ├── Models/
│   ├── Notifications/
│   │   └── WishlistUpdateNotification.php
│   ├── Providers/
│   ├── Services/
│   ├── Traits/
│   └── View/
├── database/
│   ├── database.sqlite
│   ├── factories/
│   │   ├── ProductFactory.php
│   │   └── UserFactory.php
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── auth/
│       ├── components/
│       ├── dashboard/
│       │   └── admins/
│       ├── emails/
│       │   └── wishlist_update.blade.php
│       ├── layouts/
│       ├── profile/
│       ├── dashboard.blade.php
│       └── welcome.blade.php
└── routes/
    ├── api.php
    ├── auth.php
    ├── console.php
    └── web.php
```

## 🔐 Permission System

### User Roles (via [`UserTypeEnum`](app/Enums/UserTypeEnum.php))

| Role  | Type | Description   |
| ----- | ---- | ------------- |
| User  | 0    | Standard user |
| Admin | 1    | Administrator |

### Key Features

* **Admin Management**: Full CRUD via [`dashboard/admins/`](resources/views/dashboard/admins/)
* **Profile Management**: [`profile/edit.blade.php`](resources/views/profile/edit.blade.php)
* **Email Notifications**: Wishlist updates via [`WishlistUpdateNotification`](app/Notifications/WishlistUpdateNotification.php)
* **Reusable Form Components**

## 🛡️ Key Routes & Access Control

### Authentication Routes (`routes/auth.php`)

* Login: [`auth/login.blade.php`](resources/views/auth/login.blade.php)
* Registration: [`auth/register.blade.php`](resources/views/auth/register.blade.php)
* Password Reset
* Email Verification: [`auth/verify-email.blade.php`](resources/views/auth/verify-email.blade.php)

### Protected Routes

* Admin: Admin-only user management
* Products: CRUD with authorization
* Dashboard: [`dashboard.blade.php`](resources/views/dashboard.blade.php)
* Profile: [`profile/edit.blade.php`](resources/views/profile/edit.blade.php)

## 📧 Email System

### Wishlist Notifications

* **Class**: [`WishlistUpdateNotification`](app/Notifications/WishlistUpdateNotification.php)
* **Template**: [`emails/wishlist_update.blade.php`](resources/views/emails/wishlist_update.blade.php)
* **Queue Support**: Yes

```php
$user->notify(new WishlistUpdateNotification($user, $product));
```

## 🚀 Key Features Implemented

### 1. Auth System

* Laravel Breeze + Sanctum
* Registration, login, profile CRUD

### 2. Admin Panel

* Admin creation, update, deletion
* Role assignment
* Form validation

### 3. Product Management

* CRUD
* Image uploads
* Factory seeders
* Wishlist + notifications

## 🛠️ Development Notes

* **DB**: MySQL
* **Seeders**: Users & Products
* **Assets**: Built with Vite
* **CSS**: Tailwind
* **Email**: HTML with inline styles

## 🧑‍💻 Default Credentials

| Role  | Email                                         | Password | Access         |
| ----- | --------------------------------------------- | -------- | -------------- |
| Admin | [admin@example.com](mailto:admin@example.com) | password | Full access    |
| User  | [user@example.com](mailto:user@example.com)   | password | Limited access |

## 🤝 Contributing

1. Fork
2. Create branch
3. Commit
4. Push
5. PR

## 📄 License

MIT - [https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)

## 👤 Author

**Grizi7**
🌐 [Portfolio](https://grizi7.com)
🚀 [Live Demo](https://grizi7.space)
