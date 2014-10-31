# Indigo Ruler

[![Latest Version](https://img.shields.io/github/release/indigophp/ruler.svg?style=flat-square)](https://github.com/indigophp/ruler/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/indigophp/ruler/develop.svg?style=flat-square)](https://travis-ci.org/indigophp/ruler)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/indigophp/ruler.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/ruler)
[![Quality Score](https://img.shields.io/scrutinizer/g/indigophp/ruler.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/ruler)
[![HHVM Status](https://img.shields.io/hhvm/indigophp/ruler.svg?style=flat-square)](http://hhvm.h4cc.de/package/indigophp/ruler)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/ruler.svg?style=flat-square)](https://packagist.org/packages/indigophp/ruler)

**Library to process logical rules and apply outcomes based on the result of those rules.**


## Install

Via Composer

``` bash
composer require indigophp/ruler
```


## Usage

The package consists of `Rule`s, `Assertion`s, `Results`s, `Modifier`s, `RuleSet`s and a `Processor`.

The main process centers around the `Processor`. This is responsible for taking a `Context` and a `Target` to work out which sets of rules are valid and applying their results. The `Processor` takes a `Context` and applies `Rule`s to it.
If the `Rule`s pass then a `Modifier` is applied to the `Target` to modify one or more of the `Target`'s properties.

The `Context` is the data that is being inspected whilst the `Target` is the data that is being modified and is passed by reference. Both can be an array or object or whatever you want and both can be the same thing.

The `Processor` expects to be passed one or more `RuleSet`s. A `RuleSet` is a combination of a single `Rule` and one or more `Modifiers`.

A `Rule` is combined with an `Assertion` to perform logical assertions on the `Context`. `Rule`s should be able to select data from the `Context` and then should apply an `Assertion` to this data to return a boolean value to indicate success or failure.

A `Result` should modify data within the `Target`. They work in much the same way as `Rule`s in that they select data and pass this to a `Modifier` and apply the result.

[`RuleSet` Diagram](resources/ruleset.svg)

[Processor Flow](resources/processor_flow.svg)

[Sample code](resources/example.php)


### Why is this all so complicated

While this whole process might seem complicated it allows for great flexibility when it comes to creating user-buildable
rules. The `Rule`s and `Result`s allow a user to pinpoint a single piece of data and define how to examine and modify it.


### Builder

The `Builder` class can be used to create sets of rules quickly from an array structure. This first requires setting up the various libraries so the `Builder` can create the needed classes for you.

The format of the array is represented [here](resources/builder.json).


### Manager

The `Manager` class can be used to keep track of multiple sets of the libraries that `Builder` requires. Used in conjunction with a DIC solution this can provide you with an easy way to manage multiple rule "environments".

For example, if you used the logic processor to process rules for product promotions and taxes you most likely want to use different rules and results for both. Using the `Manager` class you can set up an environment for each to be able to quickly create rule sets for both.

Adding a new environment is done via the `Manager::addEnvironment()` method, this takes a name and four "things" for each needed library for `Rule`, `Assertion`, `Result` and `Modifier`. The "thing" can be an array, string or callable.

If an array or `ArrayAccess` is passed then a new library object is created and populated with the values in the array using `AbstractLibrary::add()` with the array keys as the name.

If the thing passed is callable then it is expected to return an instance of `LibraryInterface`.

Finally if the above conditions are not met then the value is treated as a string class name and the `Manager` will attempt to construct it as a new object, passing nothing to the constructor.


## Testing

``` bash
$ phpspec run
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Steve West](https://github.com/stevewest)
- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/ruler/contributors)

Based on the work of [Steve West](https://github.com/stevewest) (original name: [LogicProcessor](https://github.com/ve-interactive/logicprocessor)), originally licensed by [Ve Interactive](http://www.veinteractive.com/) under the MIT License.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
