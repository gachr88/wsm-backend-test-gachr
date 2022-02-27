<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @package App\Document
 * @MongoDB\Document(collection="Accounts" , repositoryClass="App\Repository\ReportRepository")
 */
class Account
{
    /**
     * @MongoDB\Id(type="int" , strategy="INCREMENT")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $accountId;

    /**
     * @MongoDB\Field(type="string")
     */
    private $externalAccountId;

    /**
     * @MongoDB\Field(type="string")
     */
    private $currencyCode;

    /**
     * @MongoDB\Field(type="string")
     */
    private $status;

    /**
     * @MongoDB\Field(type="string")
     */
    private $type;

    /**
     * @MongoDB\Field(type="string")
     */
    private $accountName;
}