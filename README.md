# Bind and retrieve input data

The `vesperabr/laravel-data-binder` package provides an easy whay to bind and retrieve input data.

## Installation

You can install the package via composer:

```bash
$ composer require vesperabr/laravel-data-binder
```

The package will automatically register itself.

## Binding values

You can append values to the binding tree by two ways:

### Using `bind()` method

```php
use Vespera\DataBinder\DataBinder;
$binder = app(DataBinder::class);
$binder->bind(['foo' => 'bar'])
```

### Using blade directives

```blade
@bind(['foo' => 'bar'])
    ...
@endbind
```

## Pop data from binding

To remove the last data from binding tree just call `pop()` method.

```php
use Vespera\DataBinder\DataBinder;
$binder = app(DataBinder::class);
$binder->pop();
```

## Retrieving values from binding

To retrieve a value from binding tree use the DataValue facade.

```php
use Vespera\DataBinder\Support\Facades\DataValue;
DataValue::get('foo');
```

You can also override the current bind data passing a second parameter.

```php
$user = User::find(1);
DataValue::get('name', $user);
```

## Testing
```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Ricardo Monteiro](https://github.com/ricazao)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
