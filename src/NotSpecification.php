<?php

declare(strict_types=1);

namespace RicardoKovalski\SpecPattern;

use RicardoKovalski\SpecPattern\Contracts\Specification;

class NotSpecification extends CompositeSpecification
{
    public function __construct(
        public readonly Specification $spec,
    ) {
    }

    public function isSatisfiedBy($candidate): bool
    {
        return ! $this->spec->isSatisfiedBy($candidate);
    }
}
