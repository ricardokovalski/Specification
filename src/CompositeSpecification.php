<?php

declare(strict_types=1);

namespace RicardoKovalski\SpecPattern;

use RicardoKovalski\SpecPattern\Contracts\Specification;

abstract class CompositeSpecification implements Specification
{
    public abstract function isSatisfiedBy($candidate): bool;

    public function and(Specification $spec): AndSpecification
    {
        return new AndSpecification($this, $spec);
    }

    public function or(Specification $spec): OrSpecification
    {
        return new OrSpecification($this, $spec);
    }

    public function not(): NotSpecification
    {
        return new NotSpecification($this);
    }
}
