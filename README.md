JSONArray (PHP class)
--------------------------------

[![Latest Stable Version](https://poser.pugx.org/amostajo/php-json-array/v/stable)](https://packagist.org/packages/amostajo/php-json-array)
[![Total Downloads](https://poser.pugx.org/amostajo/php-json-array/downloads)](https://packagist.org/packages/amostajo/php-json-array)
[![License](https://poser.pugx.org/amostajo/php-json-array/license)](https://packagist.org/packages/amostajo/php-json-array)

Simple class that extends the capabilities of the basic php *array* by adding json casting and file handling (read and write).

## Quick start

* Clone or download the latest release.
* Via composer:
```bash
composer require amostajo/php-json-array
```

### Usage

Creating an array:

```php
$array = new JSONArray();
```

Add items as you normally would do using arrays:

```php
$array[] = 'example';

$array['ID'] = 123;
$array['person'] = ['name' => 'John', 'lastname' => 'Doe'];
```

Casting:

```php
// To JSON
echo $array->toJson();

// To string (casts to JSON at the end)
echo (string)$array;
```

Write to file:

```php
// Writes array as json string into filename.
$array->write($filename);
```

Read from file:

```php
// Reads from filename.
$array->read($filename);

// Use loaded array
echo $array[$key];
```

## Coding Guidelines

The coding is PSR-2.

## License

**JSONArray** is free software distributed under the terms of the MIT license.
