<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Specifications;

use RicardoKovalski\SpecPattern\CompositeSpecification;

final class OrderAlreadyRefundedSpec extends CompositeSpecification
{
    public function isSatisfiedBy($candidate): bool
    {
        return $candidate->status === 'refund' &&
            ! is_null($candidate->refundedAt);
    }
}
