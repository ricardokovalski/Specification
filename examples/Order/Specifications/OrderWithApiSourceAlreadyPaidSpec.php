<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Specifications;

use RicardoKovalski\SpecPattern\CompositeSpecification;

final class OrderWithApiSourceAlreadyPaidSpec extends CompositeSpecification
{
    public function isSatisfiedBy($candidate): bool
    {
        return $candidate->origin === 'api' &&
            $candidate->status === 'paid' &&
            ! is_null($candidate->paidAt);
    }
}