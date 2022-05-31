<?php
declare(strict_types=1);

$container = new League\Container\Container;

/**
 * CONTROLLERS
 */
$container->add(App\Application\MyDashboard\Controllers\DashboardController::class)
    ->addArgument(Library\TemplateInterface::class);

$container->add(Library\TemplateInterface::class, Library\TemplateEngine::class);

$strategy = new League\Route\Strategy\ApplicationStrategy;
$strategy->setContainer($container);