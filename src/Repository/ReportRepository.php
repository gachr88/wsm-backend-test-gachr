<?php

namespace App\Repository;

use App\Document\Account;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;


class ReportRepository extends DocumentRepository
{
    public function getByFilters($filters=[])
    {
        $builder =  $this->createAggregationBuilder(Account::class);
        if(count($filters) > 0) {
            foreach (array_keys($filters) as $key) {
                $builder->match()->field($key)->equals($filters[$key]);
            }
        }
        return $builder
            ->match()
                ->field('status')
                    ->equals('ACTIVE')
            ->lookup('Metrics')
                ->localField('accountId')
                ->foreignField('accountId')
                ->alias('metric')
            ->unwind('$metric')
                ->preserveNullAndEmptyArrays(true)
            ->group()
                ->field('_id')
                    ->expression('$accountId')
                ->field('spend')
                    ->sum('$metric.spend')
                ->field('impressions')
                    ->sum('$metric.impressions')
                ->field('clicks')
                    ->sum('$metric.clicks')
                ->field('accountName')
                    ->first('$accountName')
            ->addFields()
                ->field('costPerClick')
                    ->cond(
                        ['$eq' => ['$clicks', 0]],
                        0,
                        ['$divide' => ['$spend', '$clicks']]
                    )
            ->sort(['spend' => -1])
            ->getAggregation()
            ->getIterator()
            ->toArray();
    }
}