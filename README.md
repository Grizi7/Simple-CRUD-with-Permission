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

## 📋 Requirements

- PHP >= 8.2
- Laravel 11.x
- SQLite (included) / MySQL / MariaDB
- Composer
- Node.js & NPM (for asset compilation)

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
│   │   └── UserTypeEnum.php       # User role enumeration (0=User, 1=Admin)
│   ├── Http/Controllers/          # Application Controllers
│   │   ├── Auth/                  # Authentication
|   |   ├── Admin/                 # Admin
|   |   └── Api/                   # Api
Controllers
│   ├── Models/                    # Eloquent Models (User, Product)
│   ├── Notifications/
│   │   └── WishlistUpdateNotification.php  # Email notifications
│   ├── Providers/                 # Service Providers
│   ├── Services/                  # Business Logic Services
│   ├── Traits/                    # Reusable Traits
│   └── View/                      # View Composers
├── database/
│   ├── database.sqlite            # SQLite database (included)
│   ├── factories/
│   │   ├── ProductFactory.php     # Product model factory
│   │   └── UserFactory.php        # User model factory
│   ├── migrations/                # Database Migrations
│   └── seeders/                   # Database Seeders
├── resources/
│   ├── css/app.css                # Application styles
│   ├── js/                        # JavaScript files
│   └── views/
│       ├── auth/                  # Authentication views
│       ├── components/            # Reusable Blade components
│       ├── dashboard/
│       │   └── admins/            # Admin management views
│       ├── emails/
│       │   └── wishlist_update.blade.php  # Email template
│       ├── layouts/               # Layout templates
│       ├── profile/               # User profile management
│       ├── dashboard.blade.php    # Main dashboard
│       └── welcome.blade.php      # Landing page
└── routes/
    ├── api.php                    # API Routes
    ├── auth.php                   # Authentication Routes
    ├── console.php                # Console Commands
    └── web.php                    # Web Routes

```

## 🔐 Permission System

### User Roles (via [`UserTypeEnum`](app/Enums/UserTypeEnum.php))
| Role  | Type | Description                           |
|-------|------|---------------------------------------|
| User  | 0    | Standard user - limited access       |
| Admin | 1    | Administrator - full system access   |

### Key Features
- **Admin Management**: Full CRUD operations in [`dashboard/admins/`](resources/views/dashboard/admins/) views
- **Profile Management**: Complete user profile system via [`profile/edit.blade.php`](resources/views/profile/edit.blade.php)
- **Email Notifications**: Wishlist updates via [`WishlistUpdateNotification`](app/Notifications/WishlistUpdateNotification.php)
- **Form Components**: Reusable UI components with validation

## 🛡️ Key Routes & Access Control

### Authentication Routes
Available via [`auth.php`](routes/auth.php):
- Login/Logout with [`auth/login.blade.php`](resources/views/auth/login.blade.php)
- Registration via [`auth/register.blade.php`](resources/views/auth/register.blade.php)
- Password Reset functionality
- Email Verification via [`auth/verify-email.blade.php`](resources/views/auth/verify-email.blade.php)

### Protected Routes
- **Admin Management**: Admin-only access to user management
- **Product Management**: CRUD operations with proper authorization
- **Dashboard**: [`dashboard.blade.php`](resources/views/dashboard.blade.php) for authenticated users
- **Profile**: [`profile/edit.blade.php`](resources/views/profile/edit.blade.php) with update/delete functionality

## 📧 Email System

### Wishlist Notifications
The application includes a complete email notification system:

- **Notification Class**: [`WishlistUpdateNotification`](app/Notifications/WishlistUpdateNotification.php)
- **Email Template**: [`emails/wishlist_update.blade.php`](resources/views/emails/wishlist_update.blade.php)
- **Queue Support**: Implements `ShouldQueue` for background processing

```php
// Example usage
$user->notify(new WishlistUpdateNotification($user, $product));
```

## 🚀 Key Features Implemented

### 1. Authentication System
- Complete Laravel Breeze integration and Sanctum for API
- User registration and login
- Profile management with update/delete for Admins

### 2. Admin Panel
Admin management system with:
- User creation via [`dashboard/admins/create.blade.php`](resources/views/dashboard/admins/create.blade.php)
- User editing via [`dashboard/admins/edit.blade.php`](resources/views/dashboard/admins/edit.blade.php)
- Role assignment and management
- Form validation and error handling

### 3. Product Management
- Product CRUD operations
- Factory-based seeding via [`ProductFactory`](database/factories/ProductFactory.php)
- Image handling and display
- Wishlist functionality with notifications

## 🛠️ Development Notes

- **Database**: SQLite included for easy setup at [`database/database.sqlite`](database/database.sqlite)
- **Factories**: [`ProductFactory`](database/factories/ProductFactory.php) and [`UserFactory`](database/factories/UserFactory.php) for testing data
- **Assets**: Compiled with Vite at [`public/build/`](public/build/)
- **Styling**: Tailwind CSS with custom components
- **Email**: HTML email templates with inline styling

## 🧑‍💻 Default Credentials

Check your database seeders for default users. Typical setup includes:

| Role    | Email Example         | Password | Access Level        |
|---------|----------------------|----------|---------------------|
| Admin   | admin@example.com    | password | Full system access  |
| User    | user@example.com     | password | Limited access      |

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👤 Author

**Grizi7**
🔗 [Portfolio](https://grizi7.com)
