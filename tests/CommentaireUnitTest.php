<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Commentaires;
use DateTime;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $date = new DateTime();
        $commentaire = new Commentaires();
        $commentaire->setNom('truenom')
                ->setContenu('trueslug')
                ->setCreatedAt($date);
        
        $this->assertTrue($commentaire->getNom() === 'truenom');
        $this->assertTrue($commentaire->getContenu() === 'trueslug');
        $this->assertTrue($commentaire->getCreatedAt() === $date);

    }

    public function testIsFalse(): void
    {
        $date = new DateTime();
        $commentaire = new Commentaires();
        $commentaire->setNom('truenom')
                ->setContenu('trueslug')
                ->setCreatedAt($date);
        
        $this->assertFalse($commentaire->getNom() === 'false');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new DateTime());

    }

    public function testIsEmpty(): void
    {
        $commentaire = new Commentaires();
        
        $this->assertEmpty($commentaire->getNom());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());


    }
}
