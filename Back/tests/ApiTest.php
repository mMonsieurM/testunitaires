<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testApiAddition(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['message' => "Hello world"], $responseData);
    }

    public function testApiGetProducts(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/products');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertCount(20, $responseData);
    }
    public function testApiAddToCart(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('POST', 'api/cart/1', [
                "quantity" => 3
         ]);
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData,
            [
                "id" => 1,
                "products" => 
                [[
                    "id"=> 1,
                    "name"=> "Rick Sanchez",
                    "price" => "8",
                    "quantity" => 4,
                    "image"=> "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
                ]]
            ]
        );
    }
    public function testApiAddToCartFailure(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('POST', 'api/cart/1', [
                "quantity" => 10000
         ]);
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['error' => "too many"], $responseData);
    }

}
