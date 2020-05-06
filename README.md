# Kohana regular expression wrapper

## Requirements

PHP5, PHP7

## Example usage:

### Find matches

```php
//code
$result = Regexp::factory('/\d+/')
    ->subject('My phone is 111222333')
    ->find();

//output
string(9) "111222333"
```

```php
//code
$result = Regexp::factory('/\d+/')
    ->subject('My phone is 111222333, Your phone is 333222111')
    ->find_all();

//output
array(2) (
    0 => string(9) "111222333"
    1 => string(9) "333222111"
)
```

### Split string

```php
//code
$result = Regexp::factory('/\-/')
    ->subject('111-222-333')
    ->split();

//output
array(3) (
    0 => string(3) "111"
    1 => string(3) "222"
    2 => string(3) "333"
)
```

### Replace string

```php
//code
$result = Regexp::factory('/(\w+) (\d+) (\d+)/i')
    ->subject('May 5 2020')
    ->replace('$2 ${1} $3');

//output
string(10) "5 May 2020"
```
