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
     * @MongoDB\Field(type="numeric")
     */
    private $impressions;

    /**
     * @MongoDB\Field(type="numeric")
     */
    private $clicks;

    /**
     * @MongoDB\Field(type="numeric")
     */
    private $ctr;

    /**
     * @MongoDB\Field(type="numeric")
     */
    private $conversions;

    /**
     * @MongoDB\Field(type="numeric")
     */
    private $costPerClick;

    /**
     * @MongoDB\Field(type="numeric")
     */
    private $spend;

}