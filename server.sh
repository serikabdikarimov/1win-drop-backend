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

php artisan cache:clear
php artisan config:clear
php artisan config:cache

#2023_09_18_212315_create_site_settings_table

mysql -u $new_db_user -p $new_db_password $new_db_name -e "CREATE TABLE site_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  site_type ENUM('multi_domain', 'multi_language'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);"

# Обновление Composer
composer update

# Миграция данных
php artisan migrate
echo "Миграция завершена"

# Сидим данные
php artisan db:seed
echo "Данные добавлены"

# Вывод сообщения об успешном обновлении
echo "Репозиторий и Composer обновлены."
