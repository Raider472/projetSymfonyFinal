<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public const USER_REFERENCE = 'User';

    public function load(ObjectManager $manager)
    {
        $arrayUsers = [
            ['userName' => 'Admin', 'roles' => ["ROLE_ADMIN"], 'password' => 'Admin1'],
            ['userName' => 'user', 'roles' => ["ROLE_USER"], 'password' => 'user1']
        ];

        foreach ($arrayUsers as $arrayUser) {
            $user = new User();
            $user->setUsername($arrayUser['userName']);
            $user->setRoles($arrayUser['roles']);
            $password = $this->hasher->hashPassword($user ,$arrayUser['password']);
            $user->setPassword($password);
            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE.'_'.$arrayUser['userName'], $user);
        }

        $manager->flush();
    }
}
