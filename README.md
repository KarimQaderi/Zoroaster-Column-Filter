## Column Filter

![](https://raw.githubusercontent.com/KarimQaderi/Zoroaster-Column-Filter/master/1.png)

## نصب 

```bash
composer require karim-qaderi/zoroaster-column-filter
```


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
        public $label="فیلتر ستون";
        
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
