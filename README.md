## Для запуска приложения

Убедитесь что у вас установленны "<a href="https://www.apachefriends.org/">Xampp</a>"
и "<a href="https://getcomposer.org/">Composer</a>"
(Xampp нужен для того, чтобы на windows, поднять SQL и Apache. Либо вы можете сами развернуть сервер, через докер
контейнер или на Linux)

Далее, клонируйте репозиторий себе:

```sh
git clone https://github.com/Linsaym/ed-it
```

Переименуйте файл <strong>.env.example</strong> в <strong>.env</strong> и настройте файл под себя.

####

И последовательно выполните следующие команды:

```sh
composer install
```

```sh
php artisan key:generate
```

```sh
php artisan migrate --seed
```
