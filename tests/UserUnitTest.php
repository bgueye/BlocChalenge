<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $user->setPrenom('truePrenom')
            ->setNom('trueNom')
            ->setEmail('abc@cde.com')
            ->setPassword('pass')
            ->setTelephone('1234567890');
        
        $this->assertTrue($user->getPrenom() === 'truePrenom');
        $this->assertTrue($user->getnom() === 'trueNom');
        $this->assertTrue($user->getEmail() === 'abc@cde.com');
        $this->assertTrue($user->getPassword() === 'pass');
        $this->assertTrue($user->getTelephone() === '1234567890');

    }

    public function testIsFalse(): void
    {
        $user = new User();
        $user->setPrenom('truePrenom')
            ->setNom('trueNom')
            ->setEmail('abc@cde.com')
            ->setPassword('pass')
            ->setTelephone('1234567890');
        
        $this->assertFalse($user->getPrenom() === 'falsePrenom');
        $this->assertFalse($user->getnom() === 'falseNom');
        $this->assertFalse($user->getEmail() === 'false@cde.com');
        $this->assertFalse($user->getPassword() === 'falsepass');
        $this->assertFalse($user->getTelephone() === 'false67890');

    }

    public function testIsEmpty(): void
    {
        $user = new User();
        
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getnom());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getTelephone());

    }


}
