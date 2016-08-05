# Implicit Laravel Routes

Make implicit routes to Laravel. It's very similar like CodeIgniter routes.

## Installation

```
composer require nasution/laravel-implicit-routes
```

Register service provider inside `providers` in `config/app.php` file.

```php
Nasution\ImplicitRoutes\ServiceProvider::class,
```

## Usage

Add `Route::anything()` to your routes file.

```php
Route::anything();

Route::get('/', 'HomeController@welcome');
```

Now, you have capability to visit any path. For example, if you visit
`http://localhost/products/shoes/42`, it's equivalent

```php
Route::any('products/shoes/{param0}', 'ProductsController@shoes');

class ProductsContoller extends Controller
{
    public function shoes($id)
    {
        return $id; // 42
    }
}
```

If you visit address without second segment, it will use `index` method. For example `http://localhost/products`, it's equivalent

```php
Route::any('products', 'ProductsController@index');

class ProductsContoller extends Controller
{
    public function index()
    {
        //
    }
}
```

## License

MIT © [Mulia Arifandi Nasution](http://mul14.net)
