Webpack stats
=============

[![Build Status](https://travis-ci.org/freshheads/webpack-stats.png?branch=develop)](https://travis-ci.org/freshheads/webpack-stats)

A PHP library to read the [Webpack](https://webpack.github.io/) statistics file.

Installation
------------

Webpack-stats can easily be installed using [Composer](https://getcomposer.org/):

```bash
composer require freshheads/webpack-stats
```

Symfony bundle
--------------

We've create a Symfony Bundle that uses this library to include assets
that are build by Webpack in our templates. This bundle is called
the [FHWebpackBundle](https://github.com/freshheads/FHWebpackBundle).

Requirements
------------

This library works with PHP 5.5.9 or up.
