#!/bin/bash

#копируем файл .env.example
cp .env.example .env

#Создаем ключ
php artisan key:generate

#настраиваем доступы

# Загрузите переменные окружения из .env файла
# Путь к .env файлу
env_file=".env"

if [ -f "$env_file" ]; then
    source "$env_file"
else
    echo "Файл .env не найден."
    exit 1
fi

# Запрос значений для db_user, db_password и db_name
echo "Введите название базы данных:"
read new_db_name

echo "Введите имя пользователя:"
read new_db_user

echo "Введите пароль:"
read new_db_password

# Обновляем переменные окружения в .env файле
echo "DB_DATABASE=$new_db_name" >> "$env_file"
echo "DB_USERNAME=$new_db_user" >> "$env_file"
echo "DB_PASSWORD=$new_db_password" >> "$env_file"

# Обновление Composer
composer update

php artisan cache:clear
php artisan config:clear
php artisan config:cache

# Миграция данных
php artisan migrate
echo "Миграция заыершена"

# Сидим данные
php artisan db:seed
echo "Данные добавлены"

# Вывод сообщения об успешном обновлении
echo "Репозиторий и Composer обновлены."
