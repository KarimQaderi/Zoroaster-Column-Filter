## Column Filter






## نصب 

Run this command in your Laravel  project:

`composer require ZoroasterColumnFilter/nova-column-filter`

## استفاده 


```shell 
 php artisan Zoroaster:filter ColumnFilter 
 ```


```php
<?php

    namespace App\Zoroaster\Filters;

    use KarimQaderi\ZoroasterColumnFilter\ColumnFilter as Filter;

    class ColumnFilter extends Filter
    {
        public function columns()
        {
            return [
                ''=>'—',
                'id'=>'ID',
                'title'=>'عنوان',
            ];
        }

    }
```
