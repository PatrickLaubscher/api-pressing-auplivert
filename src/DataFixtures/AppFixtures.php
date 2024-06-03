<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Civility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher)
    {}
    public function load(ObjectManager $manager): void
    {
        $civilities = [];


        $civility = new Civility();
        $civility
            ->setName('Monsieur')
            ->setAbrevation('M.');
        $civilities[] = $civility;
        $manager->persist($civility);
        

        $adminUser = new Admin();
        $adminUser
            ->setEmail('bernardAdmin@auplivert.com')
            ->setCivility($civilities[0])
            ->setLastname('Durand')
            ->setFirstname('Bernard')
            ->setPhone('0000000000')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword(
                $adminUser,
                "admin"
            ))
            ->setDiscr('admin');
        $manager->persist($adminUser);

        $manager->flush();

    }
}
