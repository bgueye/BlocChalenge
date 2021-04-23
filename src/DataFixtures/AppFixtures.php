<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    //Création d'unutilisateur
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        $user = new User();

        $user->setEmail('bgueye@gmail.com')
             ->setPrenom($faker->firstNameMale())
             ->setNom($faker->lastName())
             ->setTelephone($faker->phoneNumber());
        
        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);


        $manager->persist($user);
        $manager->flush();
    }
}
