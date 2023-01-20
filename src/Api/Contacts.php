<?php

namespace Bernardinosousa\EgoiLaravel\Api;

use Bernardinosousa\EgoiLaravel\EgoiLaravel;
use EgoiClient\EgoiApi\ContactsApi;

class Contacts extends AbstractApi
{
    public function __construct(EgoiLaravel $egoiLaravel)
    {
        parent::__construct($egoiLaravel);

        $this->apiInstance = new ContactsApi(
            $this->getHttpClient(),
            $this->egoiLaravel->getConfig()
        );
    }
}