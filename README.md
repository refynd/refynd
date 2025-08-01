# Refynd Application

> **"Your next great application starts with Refynd."**

A modern PHP application built with the [Refynd Framework](https://github.com/refynd/framework). This skeleton provides everything you need to start building exceptional web applications with elegant simplicity and enterprise-grade power.

## 🚀 Quick Start

### Installation

Create a new Refynd application:

```bash
composer create-project refynd/refynd my-app
cd my-app
```

### Configuration

1. **Environment Setup**
   ```bash
   cp .env.example .env
   ```
   
2. **Edit your `.env` file** with your application settings

3. **Start Development Server**
   ```bash
   composer serve
   ```

4. **Visit your application** at `http://localhost:8000`

## 📁 Project Structure

```
my-app/
├── app/
│   ├── Bootstrap/          # Application configuration
│   ├── Controllers/        # HTTP controllers
│   ├── Models/            # Data models
│   └── Middleware/        # Custom middleware
├── config/                # Configuration files
├── public/                # Web server document root
│   └── index.php         # Application entry point
├── resources/
│   ├── views/            # Prism templates
│   └── assets/           # CSS, JS, images
├── routes/
│   └── web.php          # Application routes
├── storage/
│   ├── cache/           # Application cache
│   ├── logs/            # Log files
│   └── app/             # Application files
├── tests/
│   ├── Unit/            # Unit tests
│   └── Feature/         # Feature tests
├── .env.example         # Environment configuration template
└── composer.json        # Dependencies and scripts
```

## 🎯 What's Included

### 📄 Sample Pages
- **Home Page** - Welcome page with framework overview
- **About Page** - Information about your application  
- **Contact Page** - Contact form with validation
- **API Endpoints** - RESTful API examples

### 🛠️ Sample Components
- **Controllers** - Home and API controllers with examples
- **Models** - User model demonstrating ORM features
- **Views** - Prism templates with layouts and components
- **Routes** - Web and API route definitions
- **Tests** - Unit and feature test examples

### ⚙️ Configuration
- **Environment Variables** - Comprehensive `.env` configuration
- **Database Settings** - MySQL/PostgreSQL/SQLite support
- **Cache Configuration** - File, Redis, Memcached options
- **Application Settings** - Debug, timezone, URL configuration

## 🔧 Development

### Available Commands

```bash
# Start development server
composer serve

# Run tests
composer test

# Run static analysis
composer analyse

# Install dependencies
composer install

# Update dependencies
composer update
```

### Testing

Run the test suite:

```bash
composer test
```

The application includes sample tests demonstrating:
- Unit testing with PHPUnit
- Model testing
- Feature testing patterns

### Code Quality

Analyze code quality:

```bash
composer analyse
```

Uses PHPStan for static analysis to catch potential issues early.

## 🌐 Deployment

### Production Setup

1. **Install dependencies**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

2. **Configure environment**
   ```bash
   cp .env.example .env
   # Edit .env with production settings
   ```

3. **Set permissions**
   ```bash
   chmod -R 755 storage
   ```

4. **Configure web server** to point to the `public/` directory

### Environment Variables

Key environment variables to configure:

```env
APP_ENV=production          # Set to production
APP_DEBUG=false            # Disable debug mode
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql        # Database driver
DB_HOST=127.0.0.1         # Database host
DB_DATABASE=your_db       # Database name
DB_USERNAME=your_user     # Database user
DB_PASSWORD=your_pass     # Database password

CACHE_DRIVER=redis        # Production cache driver
```

## 📚 Documentation

- **[Refynd Framework Docs](https://github.com/refynd/framework/docs)** - Complete framework documentation
- **[Framework Capabilities](https://github.com/refynd/framework/docs/CURRENT_CAPABILITIES.md)** - Feature overview
- **[What You Can Build](https://github.com/refynd/framework/docs/WHAT_YOU_CAN_BUILD.md)** - Application examples

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📜 License

This project is open-source software licensed under the [MIT license](LICENSE).

---

<p align="center">
<strong>Ready to forge something extraordinary?</strong><br>
<em>Your next great application starts with Refynd.</em>
</p>
