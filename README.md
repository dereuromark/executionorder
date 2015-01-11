# Execution order in CakePHP
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg)](https://php.net/)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--2--R-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)

A demo app to **display execution order of files and callbacks in a CakePHP 3 app**.
This can be very useful for knowing if app-, plugin- or other callbacks run in the
order one expects them to.

This is an unstable repository and should be treated as an alpha.

## Results

See [RESULTS.md](RESULTS.md).

## Installation

Download and run "composer update".

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration and Usage

Create `config/app_local.php` from the default template and setup the 'Datasources' and any other
configuration relevant for your application.
Run the `cake Migrations migrate` command to have a basic test table (tokens).

Then run it and see the logs output.

## Version notice
This is only for CakePHP 3.0+. For earlier versions please see [dereuromark.de/2013/01/22/cakephp-tips](http://www.dereuromark.de/2013/01/22/cakephp-tips/#dispatcher-execution-order).

## Contributing

Feel free to add more stuff to it.

