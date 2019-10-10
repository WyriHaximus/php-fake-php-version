php-fake-php-version
==============

[![Build Status](https://travis-ci.com/WyriHaximus/php-fake-php-version.png)](https://travis-ci.com/WyriHaximus/php-fake-php-version)
[![Latest Stable Version](https://poser.pugx.org/WyriHaximus/fake-php-version/v/stable.png)](https://packagist.org/packages/WyriHaximus/fake-php-version)
[![Total Downloads](https://poser.pugx.org/WyriHaximus/fake-php-version/downloads.png)](https://packagist.org/packages/WyriHaximus/fake-php-version)
[![License](https://poser.pugx.org/wyrihaximus/fake-php-version/license.png)](https://packagist.org/packages/wyrihaximus/fake-php-version)

Ever wanted a fake non-existing version number of PHP, well this package is for you!

## Install ##

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `~`.

```
composer require wyrihaximus/fake-php-version 
```

## Available constants ##

* `WyriHaximus\FakePHPVersion\FUTURE` - Version in the next mayor version of PHP e.g. 8.98.9001
* `WyriHaximus\FakePHPVersion\CURRENT` - Version in the current mayor version of PHP e.g. 7.133.666
* `WyriHaximus\FakePHPVersion\ACTION` - Actual current version of PHP

## License ##

Copyright 2019 [Cees-Jan Kiewiet](http://wyrihaximus.net/)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.