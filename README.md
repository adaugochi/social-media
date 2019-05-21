# social-media
created an instagram clone

#creating laravel form and html builder
- Run composer require laravelcollective/html

//Add this lines in config/app.php
in providers group:
Collective\Html\HtmlServiceProvider::class,

in aliases group:
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
