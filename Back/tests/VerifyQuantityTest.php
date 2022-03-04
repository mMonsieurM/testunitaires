<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
// use App\Service\VerifyQuantityTest;

class VerifyQuantityTest extends KernelTestCase
{
    public function testQuantity(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $VerifyQuantityTest = $container->get(VerifyQuantityTest::class);

        // $result = $VerifyQuantityTest->addProductToCart("Figurine de Rick Sanchez", 24);
        // echo $result;
        // $this->assertEquals(["Figurine de Rick Sanchez",24], $result);

        //cherche comment on ajoute au panier
        //vérifier la quantité
        // appeler la fonction ajout au panier avec paramètres (ex;(:id, quantité)) addProductToCart($product, $quantity)
        // véfifier que le retour est un message avec TooQuantity
        
    }
    
}
