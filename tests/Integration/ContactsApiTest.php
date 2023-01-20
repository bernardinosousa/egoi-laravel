<?php

use Bernardinosousa\EgoiLaravel\Facades\EgoiLaravel;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

it('get contacts from list', function() {
    
    $exceptedResponseBody = file_get_contents(
        __DIR__ . '/../Responses/GetContactsFromList.json'
    );

    $mock = new MockHandler([
        new Response(200, ['Apikey' => 'testing'], $exceptedResponseBody),
    ]);
    
    $handlerStack = HandlerStack::create(
        $mock
    );

    config()->set('egoi-laravel.guzzle_options', [
        'handler' => $handlerStack
    ]);

    $listId = 1;

    $contactListResponse = EgoiLaravel::api('contacts')->getAllContacts(
        $listId
    );
    
    $this->assertInstanceOf(
        \EgoiClient\EgoiModel\ContactCollection::class,
        $contactListResponse
    );

});

it('get contact from list', function() {

    $exceptedResponseBody = file_get_contents(
        __DIR__ . '/../Responses/GetContactFromList.json'
    );

    $mock = new MockHandler([
        new Response(200, ['Apikey' => 'testing'], $exceptedResponseBody),
    ]);
    
    $handlerStack = HandlerStack::create($mock);

    config()->set('egoi-laravel.guzzle_options', [
        'handler' => $handlerStack
    ]);

    $listId = 1;

    $contactId = "f51f0117ba";

    $contactResponse = EgoiLaravel::api('contacts')->getContact(
        $contactId, 
        $listId
    );

    $this->assertInstanceOf(
        \EgoiClient\EgoiModel\ComplexContact::class,
        $contactResponse
    );

});

it('create contact from list', function() {

    $exceptedResponseBody = file_get_contents(
        __DIR__ . '/../Responses/CreateContactFromList.json'
    );

    $mock = new MockHandler([
        new Response(200, ['Apikey' => 'testing'], $exceptedResponseBody),
    ]);
    
    $handlerStack = HandlerStack::create($mock);

    config()->set('egoi-laravel.guzzle_options', [
        'handler' => $handlerStack
    ]);

    $contactBaseExtraPost = new \EgoiClient\EgoiModel\ContactBaseExtraPost([
        'base' => [
            "status" => "active",
            "first_name" => "John",
            "last_name" => "Doe",
            "birth_date" => "1975-01-10",
            "language" => "en",
            "email" => "example4@e-goi.com",
            //"cellphone" => "351-300404336",
            //"phone" => "351-300404336",
            "push_token_android" => [],
            "push_token_ios" => []
        ]
    ]);

    $listId = 1;

    $contactResponse = EgoiLaravel::api('contacts')->createContact(
        $listId, 
        $contactBaseExtraPost
    );

    $this->assertInstanceOf(
        \EgoiClient\EgoiModel\CreateContactResponse::class,
        $contactResponse
    );

});