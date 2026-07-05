# URL Shortener (Laravel + Filament)

## Возможности

* регистрация и авторизация пользователей (Laravel Breeze)
* создание коротких ссылок
* редирект по короткой ссылке
* фиксация переходов (IP + время)
* личный кабинет на Filament v3
* просмотр списка ссылок пользователя
* статистика переходов по каждой ссылке

---

## Стек

* PHP 8.4
* Laravel 10
* Filament v3
* PostgreSQL
* Docker / Docker Compose
* Node.js + Vite

---

## Быстрый запуск

### 1. Клонирование

```bash id="r1"
git clone <repo_url>
cd <repo>
```

---

### 2. ENV

```bash id="r2"
cp app/.env.example app/.env
```

---

### 3. Запуск Docker

```bash id="r3"
make up
```

---

### 4. Установка зависимостей

```bash id="r4"
make composer-install
```

---

### 5. Инициализация проекта

```bash id="r5"
make setup
```

Выполняет:

* генерацию APP_KEY
* миграции базы данных
* установку frontend зависимостей
* сборку Vite ассетов

---

## Использование

### Авторизация

* `/login`
* `/register`

---

### Админка

```
/admin
```

---

### Создание ссылки

```
/admin/short-urls/create
```

---

### Переход по ссылке

```
GET /{short_code}
```

* редирект на оригинальный URL
* запись клика (IP + timestamp)

---