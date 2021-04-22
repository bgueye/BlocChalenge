<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Articles;
use DateTime;

class ArticleUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        
        $date = new DateTime();
        $article = new Articles();
        $article->setTitre('truePrenom')
            ->setContenu('trueNom')
            ->setCreatedAt($date)
            ->setModifiedAt($date)
            ->setSlug('1234567890');
        
        $this->assertTrue($article->getTitre() === 'truePrenom');
        $this->assertTrue($article->getContenu() === 'trueNom');
        $this->assertTrue($article->getCreatedAt() === $date);
        $this->assertTrue($article->getModifiedAt() === $date);
        $this->assertTrue($article->getSlug() === '1234567890');

    }

    public function testIsFalse(): void
    {
        $date = new DateTime();
        $article = new Articles();
        $article->setTitre('truePrenom')
            ->setContenu('trueNom')
            ->setCreatedAt($date)
            ->setModifiedAt($date)
            ->setSlug('1234567890');
        
        $this->assertFalse($article->getTitre() === 'false');
        $this->assertFalse($article->getContenu() === 'false');
        $this->assertFalse($article->getCreatedAt() === new DateTime());
        $this->assertFalse($article->getModifiedAt() === new DateTime);
        $this->assertFalse($article->getSlug() === 'false');

    }
    public function testIsEmpty(): void
    {
        $article = new Articles();
        
        $this->assertEmpty($article->getTitre());
        $this->assertEmpty($article->getContenu());
        $this->assertEmpty($article->getCreatedAt());
        $this->assertEmpty($article->getModifiedAt());
        $this->assertEmpty($article->getSlug());

    }

}
