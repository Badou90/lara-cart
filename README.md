Laravel cart

## Installation

1. Require this package in your composer.json and run composer update:

		"badou/lara-cart": "dev-development"

2. After composer update, add service providers to the `config/app.php`

        'Badou\Cart\CartServiceProvider',

3. Add this to the facades in `config/app.php`:

       'Cart' => Badou\Cart\Facades\Cart::class,
