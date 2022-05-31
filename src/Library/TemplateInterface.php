<?php
declare(strict_types=1);

namespace Library;

interface TemplateInterface
{
 /**
  * @param string $templatePath
  * @param array $templateVariables
  * @return string
  */
 public function render(string $templatePath, array $templateVariables=[]): string;
}