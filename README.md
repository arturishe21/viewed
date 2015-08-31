# Пакет для функционала просмотренных товаров(страниц)

В composer.json добавляем в блок require
```json
 "vis/viewed": "1.0.*"
```

Выполняем
```json
composer update
```

Добавляем в app.php
```php
  'Vis\Viewed\ViewedServiceProvider',
```

В модель добавляем  trait
```php
  use \Vis\Viewed\ViewedTrait;
```

Теперь можем использовать методы данного трейта в наших моделях, так
```php
   //добавить в список просмотренных
   $page->setViewed();

   //просмотреть список просмотренных
   $page->getViewed();
```