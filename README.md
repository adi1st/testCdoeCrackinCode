# Laravel Project

## 📌 Overview

Ini adalah proyek Laravel yang menggunakan **Tailwind CSS** untuk styling dan memiliki **seeder database** untuk data awal, termasuk akun admin bawaan.

## 🚀 Tech Stack

-   **Laravel** (Framework Backend)
-   **Tailwind CSS** (Framework UI)
-   **MySQL / SQLite** (Database)
-   **Seeder** (Untuk mengisi data awal)

## 🔧 Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini di lokal:

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/repository.git
cd repository
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Lalu atur konfigurasi database di dalamnya.

### 4️⃣ Generate Key & Migrate Database

```bash
php artisan key:generate
php artisan migrate --seed
```

### 5️⃣ Jalankan Server

```bash
php artisan serve
```

Untuk meng-compile aset Tailwind CSS:

```bash
npm run dev
```

## 🔑 Default Admin Credentials

| Username                                      | Password |
| --------------------------------------------- | -------- |
| [admin@example.com](mailto:admin@example.com) | password |

## 📜 Fitur Utama

-   Autentikasi dengan akun admin bawaan
-   Styling menggunakan Tailwind CSS
-   Database seeding untuk data awal
-   CRUD fitur dasar

## 🛠️ Pengembangan

Untuk menjalankan **Vite** secara real-time selama pengembangan:

```bash
npm run dev
```

Untuk melakukan build production:

```bash
npm run build
```

## 📜 Lisensi

Proyek ini menggunakan lisensi **MIT**. Anda bebas untuk menggunakannya sesuai kebutuhan.

---

**Happy Coding! 🎉**
