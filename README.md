# yii2-seo #


## Installation ##

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require mirkhamidov/yii2-seo "@dev"
```

or add

```
"mirkhamidov/yii2-seo": "@dev"
```

to the require section of your `composer.json` file.

for run migrations add to your console config `migrationNamespaces`

```php
<?php
return [
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'mirkhamidov\seo\migrations',
            ],
        ],
    ],
];
```

just run 
```bash
./yii migrate
```




## Configure ##


### Backend (manage) ###

add module to your config
```php
return [
    ...,
    'modules' => [
        ...,
        'seo' => 'mirkhamidov\seo\Module',
    ],
    ...,
];
```

Routes to Menu

- `seo/page` - to add new config for route
- `seo/attribute` - to add more attributes 



### Frontend ###

add bootstap and component to your config

```php
return [
    'bootstrap' => [
        ..., 
        'seo',
    ],
    ...,
    'components' => [
        ...,
        'seo' => [
            'class' => 'mirkhamidov\seo\components\Seo'
        ],
    ],
    ...,
];
```

### Layouts ### 

#### title ####

```php
<?php
if (is_null(Yii::$app->seo->tag('title'))) {
    echo '<title>' . Html::encode($this->title) . ' - ' . Yii::$app->name . '</title>';
} else {
    echo '<title>' . Html::encode(Yii::$app->seo->tag('title')) . '</title>';
}
?>
```

#### h1 ####

```php
<h1 class="main-title">
<?php
    if (is_null(Yii::$app->seo->tag('h1'))) {
        echo Html::encode($this->title);
    } else {
        echo Html::encode(Yii::$app->seo->tag('h1'));
    }
?>
</h1>
```
