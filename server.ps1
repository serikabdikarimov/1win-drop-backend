#!/bin/bash

#копируем файл .env.example
cp .env.example .env

#Создаем ключ
php artisan key:generate

#настраиваем доступы

# Загрузите переменные окружения из .env файла
# Путь к .env файлу
env_file=".env"

if (Test-Path -Path "$env_file" -PathType Leaf) {
    # Если файл существует, выполните код в этом блоке
    . "$env_file"  # . (точка) используется для источника (source) содержимого файла
}
else {
    Write-Host "Файл .env не найден."  # Вывод сообщения об ошибке
    exit 1  # Выход из скрипта с кодом ошибки 1
}

# Запрос значений для db_user, db_password и db_name
Write-Host "Введите название базы данных:"
$new_db_name = Read-Host

Write-Host "Введите имя пользователя:"
$new_db_user = Read-Host

Write-Host "Введите пароль:"
$new_db_password = Read-Host

# Обновляем переменные окружения в .env файле
Set-Content -Path $env_file -Value "DB_USER=$new_db_user"
Set-Content -Path $env_file -Value "DB_PASSWORD=$new_db_password"
Set-Content -Path $env_file -Value "DB_NAME=$new_db_name"

# Обновление Composer
composer update

# Вывод сообщения об успешном обновлении
Write-Host "Репозиторий и Composer обновлены."
