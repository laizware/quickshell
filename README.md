# LaizWare Quickshell

Quick wrapper for shell_exec to execute or run external commands from PHP that allows setting the working directory, environment variables and return the standard output.

## Installation

```
composer require laizware/quickshell
```

## Example

```php
<?php

use function LaizWare\Quickshell\run;

$command   = "ls";
$arguments = ["-l"];
$wd        = "/tmp/";
$env       = [
    "MY_ENVIRONMENT_X" => "X",
    "MY_ENVIRONMENT_Y" => "Y",
    "MY_ENVIRONMENT_Z" => "Z",
];

$stdout = run(
    // Required
    $command,

    // Optional
    $arguments,
    $env,
    $wd,
);
```
