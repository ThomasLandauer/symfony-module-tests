<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('john_doe@gmail.com');
        $user->setPassword('123456');
        $user->setRoles(['ROLE_CUSTOMER']);

        $manager->persist($user);
        $manager->flush();
    }
}
