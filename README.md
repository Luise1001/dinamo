# Dinamo

**Dinamo** is a Progressive Web Application (PWA) built with **Laravel, Jetstream, and Livewire**, designed to manage high-value logistics — specifically the safe assignment and tracking of deliveries such as cash transfers. The system allows administrators to assign drivers, enforce cash limits, and monitor the full delivery cycle with role-based access and real-time notifications.

---

## 🚚 Core Features

- **Users** can:
  - Submit delivery requests (e.g., cash pickups).
  - Track the status of their shipments.

- **Drivers**:
  - Are assigned deliveries based on availability.
  - Have a configurable wallet limit (e.g., max amount of cash).
  - Must return to the company before receiving new assignments once the limit is reached.
  - Can mark deliveries as completed, triggering wallet reset.

- **Admin/Company Panel**:
  - Create and manage drivers and delivery agents.
  - Monitor driver status and wallet amounts.
  - Configure allowed currencies and max wallet thresholds.
  - Assign deliveries and control the flow of cash-handling operations.
  - Enable and send **push notifications** via Firebase.

---

## ⚙️ Tech Stack

- **Laravel + Jetstream**
- **Livewire**
- **Tailwind CSS**
- **MySQL**
- **Firebase** (push notifications)
- **PWA setup** (offline capabilities & installable)

---

## 🚀 Installation

```bash
git clone https://github.com/Luise1001/dinamo.git
cd dinamo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
