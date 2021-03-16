<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

final class EnvironmentController extends AbstractController
{
    public function __invoke(KernelInterface $kernel): Response
    {
        return new Response($kernel->getEnvironment());
    }
}
