<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Brick\Math\BigDecimal;
use Brick\Math\BigRational;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Exception\IOException;

class App
{
    public static function main($argc, $argv)
    {
        if ($argc < 2) {
            echo 'Usage: php test.php number_of_files_to_copy' . PHP_EOL;
            exit;
        }

        $numFilesToCopy = (int)$argv[1];
        if ($numFilesToCopy < 1) {
            $numFilesToCopy = 1;
        }

        $fileName = 'test.yml';
        $filePath = __DIR__ . '/' . $fileName;

        $yamlArr = Yaml::parse(file_get_contents($filePath));
        $newFilenamePrefix = $yamlArr['new_filename_prefix'];

        try {
            $filesystem = new Filesystem();
            for ($i = 1; $i <= $numFilesToCopy; $i++) {
                $newFilepath = __DIR__ . "/{$newFilenamePrefix}_{$i}.yml";
                $filesystem->copy($filePath, $newFilepath);
            }
        } catch (FileNotFoundException $e) {
            echo "File '{$filePath}' could not be found!" . PHP_EOL;
        } catch (IOException $e) {
            echo "Could not copy file '{$filePath}' to '{$newFilepath}'!" . PHP_EOL;
        } finally {
            // Just for fun
            unset($filesystem);
        }

        $funny = (int)((0.7 + 0.1) * 10);
        echo $funny . PHP_EOL;

        $notFunny = BigDecimal::of(0.7)->plus(BigDecimal::of(0.1))->multipliedBy(10)->toInteger();
        echo $notFunny . PHP_EOL;

        $notFunny = BigRational::of('7/10')->plus(BigRational::of('1/10'))->multipliedBy(10)->toInteger();
        echo $notFunny . PHP_EOL;
    }
}

App::main($argc, $argv);
