# Laravel Rule NHS Number Validator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fredbradley/laravel-rule-nhs-number.svg?style=flat-square)](https://packagist.org/packages/fredbradley/laravel-rule-nhs-number)
[![Build Status](https://img.shields.io/travis/fredbradley/laravel-rule-nhs-number/master.svg?style=flat-square)](https://travis-ci.org/fredbradley/laravel-rule-nhs-number)
![StyleCI Status](https://github.styleci.io/repos/241368220/shield)
[![Total Downloads](https://img.shields.io/packagist/dt/fredbradley/laravel-rule-nhs-number.svg?style=flat-square)](https://packagist.org/packages/fredbradley/laravel-rule-nhs-number)

This is a [Custom Laravel Rule](https://laravel.com/docs/5.8/validation#using-rule-objects) for validating an NHS Number. 

The NHS Number validation logic is written by [Liam](https://github.com/imliam/php-nhs-number) and found in a [separate package](https://github.com/imliam/php-nhs-number), if you'd like to use it without Laravel's dependencies.

 ## Installation
 
 Install the package using Composer:
 
 ```bash
 composer require fredbradley/laravel-rule-nhs-number
 ```
Laravel's service provider discover will automatically configure the service provider for you.

## Using the Validator
After installation, the validator will be available for use directly in your validation rules.
```php
'field_name' => 'nhsnumber'
```

Within the context of a form controller it would like like this:
```php
return Validator::make($data, [
    'name' => 'required|string|max:255',
    'nhs_number' => 'required|string|nhsnumber'
]);
```

## Using the Rule Object
_NB: This is needed required to use with some form builders like Kris Forms_

```php

return Validator::make($data, [
    'name' => 'required|string|max:255',
    'nhs_number' => [
        'required',
        'string',
        new \FredBradley\NhsNumber\ValidateNhsNumber()
    ]
]);
```

## Added bonus: Generators
Because we're using Liam's original code, I've added in a `Generator` helper class. Use this in your projects to generate valid random NHS Numbers:
```php
echo \FredBradley\NhsNumber\Generator::nhsNumber();
// '9278462608'
```
```php
echo \FredBradley\NhsNumber\Generator::nhsNumber(3);
// ['7448556886', '0372104223', '8416367035']

```


## Contributing
At the moment the package is only available in English - due to the way the error message is displayed. If someone would like to contribute to make it translatable that would be nice of them.

## 👷 Credits
- [Fred Bradley](https://github.com/fredbradley) for the Laravel-ication of the validator
- [Liam Hammett](https://github.com/imliam) for the original package
- [Peter Fisher](https://github.com/pfwd/NHSNumber-Validation) for the original class
- [All Contributors](../../contributors)

## ♻️ License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.
