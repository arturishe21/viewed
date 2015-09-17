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

```php
   //добавить в список просмотренных
   Viewed::setViewed($model);

   //просмотреть список просмотренных id
   Viewed::getViewed($model);

   //вернуть список записей модели
   Viewed::getViewedWithModel($model);
```