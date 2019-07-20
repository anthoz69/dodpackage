# dodpackage

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This package is collect my methods and function use frequently in laravel be careful if you are using this package it can be breaking chage anytime. Please fork it to your own repository, And send some PR for cool feature if you need to contribute it.

## Installation

1 - Install the package via Composer:

```bash
composer require anthoz69/dodpackage
```

The package will automatically register its service provider.

> **Note**: If you are using Laravel 5.5, the steps 2 and 3, for providers and aliases, are unnecessaries. Dod Package supports Laravel new [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

2 - You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your `config/app.php` file adding the following code at the end of your `'providers'` section:

> `config/app.php`

```php
'providers' => [
    // other providers ommited
    anthoz69\dodpackage\Providers\DodPackageServiceProvider::class,
],
```

## Usage

### File store function

Save file from frontend upload in laravel and generate unique file name before store file.

```php
dodStore::cropImage($file, $storeFolder, $width = 500, $height = 500)
dodStore::resizeImage($file, $storeFolder, $width = 500, $height = 500)
dodStore::cropImageRatio($file, $storeFolder, $width = 500, $height = 500)
dodStore::resizeImageRatio($file, $storeFolder, $width = 500, $height = 500)
dodStore::store($file, $storeFolder)
dodStore::delete($storePath, $replace = '/storage')
dodStore::uniqueFilename($file, $storeFolder)
```

e.g.
```php
// store image in /storage/app/public/user/cover size 300x300px
dodStore::cropImage($request->file('image'), 'user/cover', 300, 300) // crop image from center
dodStore::resizeImage($request->file('image'), 'user/cover', 300, 300) // force resize image

// Ratio is mean not resize or crop retain maximal original image size
dodStore::cropImageRatio($request->file('image'), 'user/cover', 300, 300) // crop image from center
dodStore::resizeImageRatio($request->file('image'), 'user/cover', 300, 300)

dodStore::store($request->file('image'), 'image') // store image in /storage/app/public/image
dodStore::delete('/storage/image/0aBJHcbT5d0e4a6fb7d4c.jpg', '/storage') // delete file
dodStore::uniqueFilename($request->file('image'), 'image') // 0aBJHcbT5d0e4a6fb7d4c with file extention like 0aBJHcbT5d0e4a6fb7d4c.jpg

```

### General function
2 => 2.00

4.75668 => 4.75

```php
setCurrency($number, $percision = 2);
```

### Router function

**isRoutePrefix** If your url start with /admin or something will place `active class` to html attribute class it good for hierarchy menu.

```php
isRoutePrefix($on, $class = 'active', $prefix = '');
```

e.g. your url `/admin/user/create`.

```php
<li class="{{ isRoutePrefix('/admin/user', 'active-patent-menu') }}"></li>

// output if url start with /admin/user
<li class="active-patent-menu"></li>
```

**isRoute** When user access to url and [laravel route name](https://laravel.com/docs/5.8/routing#named-routes) matched it will output class.

```php
isRoute($routeName = '', $class = 'active');

isRoute('user.create', 'active-color-menu') // result: active-color-menu
isRoute('user.create') // result: active
```

### Video function

get id from url support Youtube, Vimeo if wrong format will return `null`.

```php
getYoutubeId('https://www.youtube.com/watch?v=aAzUC8vNtgo') // output: aAzUC8vNtgo
getVimeoId('https://vimeo.com/68529790') // output: 68529790
```

### Time function in Thailand country format

Send timestamp (created_at, updated_at in laravel) to function will return string time.

```php
getMonthListTH($index, $short = false)
getDateTH($strDate, $fullMonth = false, $time = false)
getTimeFromDate($strDate, $second = true)
```

e.g.

```php
getMonthListTH(1) // มกราคม
getMonthListTH(1, true) // ม.ค.

getDateTH('2019-07-17 16:07:42') // 17 กรกฏาคม 2562
getDateTH('2019-07-17 16:07:42', true) // 17 ก.ค. 2562
getDateTH('2019-07-17 16:07:42', true, true) // 17 ก.ค. 2562 16:07

getTimeFromDate('2019-07-17 16:07:42') // 16:07
getTimeFromDate('2019-07-17 16:07:42', true) // 16:07:42
```

## Security

If you discover any security related issues, please open the issue or send me some cool PR.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## License

license is under MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anthoz69/dodpackage.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/anthoz69/dodpackage.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/anthoz69/dodpackage/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/170982626/shield

[link-packagist]: https://packagist.org/packages/anthoz69/dodpackage
[link-downloads]: https://packagist.org/packages/anthoz69/dodpackage
[link-travis]: https://travis-ci.org/anthoz69/dodpackage
[link-styleci]: https://styleci.io/repos/170982626
[link-author]: https://github.com/anthoz69
[link-contributors]: ../../contributors
