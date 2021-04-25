<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Commentaires;
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
    //Création d'un utilisateur
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


        $categorie = new Categories();

        $categorie->setNom($faker->word())
            ->setSlug($faker->slug())
            ->setNom($faker->lastName());

        $manager->persist($categorie);


        $article = new Articles();

        $article->setTitre($faker->title())
            ->setSlug($faker->slug())
            ->setContenu($faker->text())
            ->setCreatedAt($faker->dateTimeBetween('-6 month', '-2 month'))
            ->setModifiedAt($faker->dateTimeBetween('-2 month', 'now'))
            ->setUser($user)
            ->addCategorie($categorie)
            ->setPublication(true);

        $manager->persist($article);

        for ($i = 0; $i < 10; $i++){

            $comm = new Commentaires();

            $comm->setNom($faker->name())
                ->setContenu($faker->text())
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setArticle($article);

            $manager->persist($comm);
        }
    


        $manager->flush();
    }
}
