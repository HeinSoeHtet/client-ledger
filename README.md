# Client Ledger

A professional, modern, and high-performance client and billing management system built with Laravel. This application provides a streamlined interface for managing client relationships and tracking financial records with a focus on user experience and aesthetic excellence.

## ✨ Key Features

- **Modern Premium Dashboard**: A sleek, card-based interface featuring glassmorphism headers, subtle animations, and a professional dark-themed navigation sidebar.
- **Client Management**: 
  - Detailed profiles with support for high-quality photo uploads.
  - **Gmail-style Avatars**: Intelligent dynamic placeholders that assign unique, vibrant colors based on the client's name initials.
  - Quick access via Floating Action Buttons (FAB).
- **Billing & Invoicing**:
  - Centralized billing management with real-time due date tracking.
  - High-visibility status badges (e.g., Soft Indigo for upcoming deadlines).
  - Streamlined "Billings" creation from any view.
- **Optimized Experience**:
  - **Zero Loading Lag**: Optimized FontAwesome asset delivery and pre-compiled CSS.
  - **Responsive Design**: Fully mobile-friendly layout that adapts to any screen size.
  - **Fast Navigation**: Cursor-based pagination for handling large datasets efficiently.

## 🚀 Tech Stack

- **Core**: Laravel 8.x (PHP 8.1+)
- **Database**: MySQL 8.0
- **Frontend**: Blade, SCSS (Modernized Bootstrap/AdminLTE), JavaScript
- **DevOps**: Laravel Sail (Docker Compose workflow)
- **Assets**: Laravel Mix, FontAwesome 5 (Optimized)

## 🛠️ Installation

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd client-ledger
   ```

2. **Environment Setup**:
   ```bash
   cp .env.example .env
   ```

3. **Start the Environment (Sail)**:
   ```bash
   sh vendor/bin/sail up -d
   ```

4. **Install Dependencies**:
   ```bash
   ./vendor/bin/sail composer install
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run dev
   ```

5. **Generate App Key & Migrate**:
   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate --seed
   ./vendor/bin/sail artisan storage:link
   ```

## 🔑 Access

The default administrator credentials (if seeded):
- **Email**: `admin@email.com`
- **Password**: `password`

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).
