Laravel meta-tags injector

## Installation

1. Require this package in your composer.json and run composer update:

		"badou90/meta": "dev-development"

2. After composer update, add service providers to the `config/app.php`

        'Badou\Meta\MetaTagsServiceProvider',

3. Add this to the facades in `config/app.php`:

       'Meta' => Badou\MetaTags\Facades\MetaTags::class,

4. Run this command in terminal to publish config:

       $ php artisan vendor:publish
