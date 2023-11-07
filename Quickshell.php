<?php

namespace LaizWare\Quickshell;

/**
 * Run a command.
 * 
 * @param string $command Command name.
 * @param array  $arguments Command options and arguments.
 * @param array  $env Command environment variables where the key is the variable name and the value is the variable value.
 * @param string $wd Command working directory.
 * 
 * @return string Command stdout.
 */
function run($command, $arguments = [], $env = [], $wd = ".") {
    // Working Directory
    $owd = getcwd();
    chdir($wd);

    // Environment Variables
    foreach ($env as $key => $value)
        putenv("{$key}={$value}");

    // Arguments
    $arguments = implode(" ", array_map("escapeshellarg", $arguments));

    // Command
    $command = escapeshellcmd("{$command}");

    // Run
    try {
        $stdout = shell_exec("{$command} {$arguments}");
    } finally {
        // Clean Working Directory
        chdir($owd);

        // Clean Environment Variables
        foreach ($env as $key => $_v)
            putenv("{$key}");
    }

    return $stdout;
}
