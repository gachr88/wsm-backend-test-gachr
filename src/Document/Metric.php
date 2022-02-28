<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @package App\Document
 * @MongoDB\Document(collection="Metrics" , repositoryClass="App\Repository\ReportRepository")
 */
class Metric
{
    /**
     * @MongoDB\Id(type="string")
     */
    private $id;

    /**
     * @MongoDB\Field(type="date")
     */
    private $date;

    /**
     * @MongoDB\Field(type="string")
     */
    private $accountId;

    /**
     * @MongoDB\Field(type="float")
     */
    private $impressions;

    /**
     * @MongoDB\Field(type="float")
     */
    private $clicks;

    /**
     * @MongoDB\Field(type="float")
     */
    private $ctr;

    /**
     * @MongoDB\Field(type="float")
     */
    private $conversions;

    /**
     * @MongoDB\Field(type="float")
     */
    private $costPerClick;

    /**
     * @MongoDB\Field(type="float")
     */
    private $spend;

}