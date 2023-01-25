<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Specifications;

use RicardoKovalski\SpecPattern\CompositeSpecification;

final class OrderPendentSpec extends CompositeSpecification
{
    public function isSatisfiedBy($candidate): bool
    {
        return is_null($candidate->paid_at) &&
            $candidate->status === 'pendent';
    }
}
