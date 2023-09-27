# Execution order in CakePHP

[![Build Status](https://api.travis-ci.org/dereuromark/executionorder.svg?branch=master)](https://travis-ci.org/dereuromark/executionorder)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg)](https://php.net/)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--2--R-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)

A demo app to **display execution order of files and callbacks in a CakePHP app**.
This can be very useful for knowing if app-, plugin- or other callbacks run in the
order one expects them to.

This is an unstable repository and should be treated as an alpha.

## Results

See [RESULTS.md](RESULTS.md).

## Installation

Download and run `composer install`.

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

For CLI to work you might have to run `chmod +x bin/cake`, as well.

## Configuration and Usage

Create `config/app_local.php` from the default template and setup the 'Datasources' and any other
configuration relevant for your application.

Run the `bin/cake migrations migrate` command to have a basic test table (tokens).

Then run it and see the logs output.
To build an updated RESULTS.md file, execute `bin/cake exec prep` after each run to build a TMP/exec.txt from the log output.

## Version notice
This branch is only for CakePHP 4 (currently 4.4).

For earlier versions please see [dereuromark.de/2013/01/22/cakephp-tips](http://www.dereuromark.de/2013/01/22/cakephp-tips/#dispatcher-execution-order)
or check other branches.

## Contributing

Feel free to add more stuff to it.
