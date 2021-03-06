<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Tests\FunctionalTester;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener;
use Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector;
use Symfony\Component\Console\EventListener\ErrorListener;

final class EventsCest
{
    public function dontSeeEventTriggered(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(ErrorListener::class);
        $I->dontSeeEventTriggered(new ErrorListener());
        $I->dontSeeEventTriggered([ErrorListener::class, ErrorListener::class]);
    }

    public function dontSeeOrphanEvent(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form[name=login]', [
            'email' => 'john_doe@gmail.com',
            'password' => '123456',
            '_remember_me' => false
        ]);
        $I->dontseeOrphanEvent();
        $I->dontSeeOrphanEvent('security.authentication.success');
    }

    public function seeEventTriggered(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->seeEventTriggered(SecurityListener::class);
        $I->seeEventTriggered(new RouterDataCollector());
        $I->seeEventTriggered([SecurityListener::class, RouterDataCollector::class]);
    }

    public function seeOrphanEvent(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->submitSymfonyForm('registration_form', [
            '[email]' => 'jane_doe@gmail.com',
            '[plainPassword]' => '123456',
            '[agreeTerms]' => true
        ]);
        $I->seeOrphanEvent('security.authentication.success');
    }
}
