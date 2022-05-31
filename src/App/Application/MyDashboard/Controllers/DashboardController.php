<?php
declare(strict_types=1);

namespace App\Application\MyDashboard\Controllers;

use Laminas\Diactoros\Response\RedirectResponse;
use Library\TemplateInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

class DashboardController
{

 private const GREETING_MSG = "Welcome to the demo";

 public function __construct(private TemplateInterface $templateEngine)
 {
  $this->templateEngine = $templateEngine;
 }
 
 /**
  * 
  * @param ServerRequestInterface $request
  * @return ResponseInterface
  */
 public function index(ServerRequestInterface $request): ResponseInterface
 {
  return new Response\HtmlResponse(
   $this->templateEngine->render(
    'MyDashboard/index.twig',
    [
     'message' => self::GREETING_MSG
    ]
   )
  );
 }

}