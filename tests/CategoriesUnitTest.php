<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Categories;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $categorie = new Categories();
        $categorie->setNom('truenom')
                ->setSlug('trueslug');
        
        $this->assertTrue($categorie->getNom() === 'truenom');
        $this->assertTrue($categorie->getSlug() === 'trueslug');

    }

    public function testIsFalse(): void
    {
        $categorie = new Categories();
        $categorie->setNom('truenom')
                ->setSlug('trueslug');
        
        //$this->assertTrue($categorie->getNom() === 'falsenom');
        //$this->assertTrue($categorie->getSlug() === 'falseslug');
        $this->assertFalse($categorie->getNom() === 'false');
        $this->assertFalse($categorie->getSlug() === 'false');

    }

    public function testIsEmpty(): void
    {
        $categorie = new Categories();
        
        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getSlug());
   }

}
