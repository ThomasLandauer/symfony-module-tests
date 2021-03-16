<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Entity\User;
use App\Tests\FunctionalTester;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class EnvironmentCest
{
    // vendor/bin/codecept run Functional EnvironmentCest:try -vvv
    public function try(FunctionalTester $I)
    {
        $I->amOnPage('/environment');
        codecept_debug($I->grabPageSource());
    }
}
