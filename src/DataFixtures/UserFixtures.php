<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Users();
        $user->setUsername('immo');
        $user->setPassword($this->encoder->encodePassword($user, 'immo'));
        $manager->persist($user);
        $manager->flush();
    }
}
