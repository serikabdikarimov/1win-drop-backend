#!/bin/bash

#копируем файл .env.example
cp .env.example .env

#Создаем ключ
php artisan key:generate

#настраиваем доступы

# Загрузите переменные окружения из .env файла
# Путь к .env файлу
$env_file = ".env"

if (Test-Path -Path "$env_file" -PathType Leaf) {
    # Если файл существует, выполните код в этом блоке
    . "$env_file"  # . (точка) используется для источника (source) содержимого файла
}
else {
    Write-Host "Файл .env не найден."  # Вывод сообщения об ошибке
    exit 1  # Выход из скрипта с кодом ошибки 1
}

# Запрос значений для db_user, db_password и db_name
Write-Host "Введите название базы данных (DB_NAME):"
$new_db_name = Read-Host

Write-Host "Введите имя пользователя (DB_USERNAME):"
$new_db_user = Read-Host

Write-Host "Введите пароль (DB_PASSWORD):"
$new_db_password = Read-Host

# Обновляем переменные окружения в .env файле
Add-Content -Path $env_file -Value "DB_DATABASE=$new_db_name"
Add-Content -Path $env_file -Value "DB_USERNAME=$new_db_user"
Add-Content -Path $env_file -Value "DB_PASSWORD=$new_db_password"

$script = @"
CREATE TABLE $tableName (
  id INT AUTO_INCREMENT PRIMARY KEY,
  site_type ENUM('multi_domain', 'multi_language'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
"@

$command = "mysql -u $new_db_user -p $new_db_password $new_db_name -e `"$script`""
Invoke-Expression $command

# Обновление Composer
composer update

# Вывод сообщения об успешном обновлении
Write-Host "Репозиторий и Composer обновлены."
