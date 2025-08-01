# Refynd Application

> **"Your next great application starts here."**

This is a Refynd application created from the official application skeleton. Refynd combines enterprise-grade power with elegant simplicity to help you craft exceptional web applications.

## 🚀 Quick Start

### Installation

```bash
# Create a new Refynd application
composer create-project refynd/refynd my-app
cd my-app

# Set up environment
cp .env.example .env

# Start development server
composer serve
```

Your application will be available at http://localhost:8000

### Development

```bash
# Install dependencies
composer install

# Run tests
composer test

# Static analysis
composer analyse

# Development server
composer serve
```

## 📁 Project Structure

```
my-app/
├── app/                 # Application logic
│   ├── Controllers/     # HTTP controllers
│   ├── Models/         # Database models
│   ├── Middleware/     # Custom middleware
│   └── Bootstrap/      # Application bootstrap
├── config/             # Configuration files
├── public/             # Web server document root
├── resources/          # Views, assets, etc.
│   ├── views/         # Prism templates
│   └── assets/        # CSS, JS, images
├── routes/             # Route definitions
├── storage/            # Cache, logs, uploads
└── tests/              # Test suite
```

## 🎯 Features Included

- **🏠 Welcome Pages** - Beautiful homepage and about page
- **📧 Contact Form** - Working contact form with validation
- **🔌 API Endpoints** - Sample REST API routes
- **🎨 Prism Templates** - Elegant view templates
- **✅ Form Validation** - Built-in validation examples
- **💾 Caching Examples** - Cache implementation samples
- **🧪 Test Suite** - Ready-to-use testing setup

## 📚 Next Steps

1. **Configure Database** - Update `.env` with your database credentials
2. **Customize Templates** - Edit views in `resources/views/`
3. **Add Routes** - Define new routes in `routes/web.php`
4. **Create Controllers** - Add controllers in `app/Controllers/`
5. **Build Models** - Create models in `app/Models/`

## �� Configuration

Edit your `.env` file to configure:

- **Database Connection** - MySQL, PostgreSQL, SQLite
- **Cache Driver** - File, Redis, Memcached
- **Application Settings** - Name, environment, debug mode

## 📖 Documentation

- **[Refynd Framework](https://github.com/refynd/framework)** - Core framework repository
- **[Framework Documentation](https://github.com/refynd/framework/docs)** - Complete guides
- **[API Reference](https://github.com/refynd/framework/wiki)** - Detailed API docs

## 🤝 Contributing

Found a bug or want to contribute? Check out the [Refynd Framework](https://github.com/refynd/framework) repository.

## 📜 License

This application skeleton is open-source software licensed under the [MIT license](LICENSE).

---

<p align="center">
<strong>Ready to forge something extraordinary?</strong><br>
<em>Build amazing applications with Refynd.</em>
</p>
