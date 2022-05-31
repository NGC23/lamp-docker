<?php
declare(strict_types=1);

namespace Library;

use Twig\Environment as TwigEnviorment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader as FilesystemLoader;

class TemplateEngine implements TemplateInterface
{
 private  TwigEnviorment $twig;
 private FilesystemLoader $loader;
 // Not ideal setup, will look at better implementations, this was quick and dirty to get it going
 public function __construct()
 {
     $this->loader = new FilesystemLoader(['Templates']);
     $this->twig = new TwigEnviorment($this->loader, ['debug' => true]);
 }
 public function render(string $templatePath, array $templateVariables = []): string
 {
     try {
         return $this->twig->render($templatePath, $templateVariables);
     } catch (LoaderError | RuntimeError | SyntaxError $e) {
         // throw custom exception
         print_r($e->getMessage());
         // add logger
         die('error wtf neil');
     }
 }
}