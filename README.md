# 🏥 Medibot
> A healthcare platform that simplifies the booking process of medical appointments.

```quote
“Technology should empower accessibility — Medibot aims to make healthcare more approachable for everyone.”
```

---


## 🌟 Overview

**Medibot** is a prototype web application designed to streamline healthcare scheduling.  
Built with **Laravel 12**, **Livewire**, and **Volt**, it empowers users to browse facilities, filter doctors by department, and confirm appointments — all within an intuitive interface.


---


## 🚀 Key Features

✨ **Authentication** — Registration and login with Laravel Breeze.
🏥 **Filtering** — Users can view available doctors based on department selection.
📅 **Appointment Booking** — Book, view, and manage your upcoming appointments easily.
🎁 **Reward System** — Earn and redeem health-related rewards for engagement.
📧 **Email Confirmation** — Instant appointment confirmation via Mailtrap sandbox.
👵 **Elderly-Friendly Design** — Clean layout with readable fonts and accessible components.
⚙️ **Admin Seeding** — Pre-seeded data for testing facilities, doctors, and departments.


---


## 🧱 Tech Stack

| Layer | Technology |
|-------|-------------|
| **Framework** | Laravel 12 |
| **Frontend** | Blade + Bootstrap 5 |
| **Database** | MySQL |
| **Mail Service** | Mailtrap SMTP Sandbox |
| **Version Control** | Git + GitHub |


---


## 🗂️ Project Structure (Relevant Files)

Medibot/
│
├── app/
│ ├── Http/Controllers/
│ │ └── AppointmentController.php
│ ├── Models/
│ │ ├── Appointment.php
│ │ ├── Doctor.php
│ │ ├── HealthFacility.php
│ │ ├── Department.php
│ │ └── Reward.php
│
├── resources/views/
│ ├── appointments/
│ │ ├── index.blade.php
│ │ └── create.blade.php
│ ├── health_facilities/
│ │ └── index.blade.php
│ ├── emails/
│ │ └── appointment-confirmation.blade.php
│ └── components/
│ └── layouts/
│ ├── main.blade.php
│ └── navbar.blade.php
│
├── routes/web.php
├── database/seeders/
├── .env
├── composer.json
└── README.md


---


## ⚙️ Installation & Setup

### 🧩 1. Clone the repository
```bash
git clone https://github.com/StenlyLukmana/medibot_temporary.git
cd medibot_temporary
```

### 📦 2. Install dependencies
```bash
composer install
npm install
```

### ⚙️ 3. Configure env
```bash
cp .env.example .env
```
Mailtrap config in env file:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[generated username]
MAIL_PASSWORD=[generated password]
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@medibot.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 🔑 4. Generate key
```bash
php artisan key:generate
```

### 🗃️ 5. Run migrations and seeders
```bash
php artisan migrate:fresh --seed
```

### ▶️ 6. Run the app
```bash
php artisan serve
```


---


## ✉️ Email Integration (Mailtrap)

All confirmation emails use Mailtrap Sandbox so no real messages are sent.
1. Go to Mailtrap.io
2. Find the sandbox section
3. Sandboxes → Add Sandbox → Integration → SMTP
4. Copy the generated credentials into .env
5. When an appointment is created, an email will appear in the inbox.


---


📜 License

This project was created for educational and portfolio purposes.
© 2025 Stenly Lukmana — All rights reserved.
