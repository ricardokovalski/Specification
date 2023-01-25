<?php

declare(strict_types=1);

namespace RicardoKovalski\SpecPattern;

use RicardoKovalski\SpecPattern\Contracts\Specification;

class AndSpecification extends CompositeSpecification
{
    public function __construct(
        public readonly Specification $left,
        public readonly Specification $right,
    ) {
    }

    public function isSatisfiedBy($candidate): bool
    {
        return $this->left->isSatisfiedBy($candidate) && $this->right->isSatisfiedBy($candidate);
    }
}
