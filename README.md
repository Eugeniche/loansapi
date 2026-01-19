# Loans API для подачи и обработки заявки на займ

## Описание
Микросервис для обработки заявок на займ с использованием Yii2, Nginx, PostgreSQL и Docker.

## Технологии
- PHP 8.1
- Yii2 Framework
- PostgreSQL 15
- Nginx
- Docker Compose

### Предварительные требования
- Docker
- Docker Compose

### Установка и запуск проекта

1. Клонируйте репозиторий:
    git clone https://github.com/Eugeniche/loansapi.git
2. Переходим в папку с проектом:
    cd loansapi
3. Запускаем Docker compose:
    docker compose up -d

Если автоматически не запустились миграции:
    docker compose exec php php yii migrate --interactive=0