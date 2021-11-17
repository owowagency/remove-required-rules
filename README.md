# Remove required rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/owowagency/remove-required-rules.svg?style=flat-square)](https://packagist.org/packages/owowagency/remove-required-rules)
[![Total Downloads](https://img.shields.io/packagist/dt/owowagency/remove-required-rules.svg?style=flat-square)](https://packagist.org/packages/owowagency/remove-required-rules)
![GitHub Actions](https://github.com/owowagency/remove-required-rules/actions/workflows/main.yml/badge.svg)

Sometimes you'd like to reuse all rules from the store request in an update request, but without the required rules. This helper methods does that for you. It loops through all the rules and tries to remove the required rule for you.  

## Installation

You can install the package via composer:

```bash
composer require owowagency/remove-required-rules
```

## Usage

```php
$rules = (new StoreRequest())->rules(); // Input: 'required|string' or ['required', 'string']

$rules = remove_required($rules); // Output: 'string' or ['string']
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dees@owow.io instead of using the issue tracker.

## Credits

-   [Dees Oomens](https://github.com/owowagency)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
