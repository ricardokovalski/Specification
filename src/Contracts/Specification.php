<?php

declare(strict_types=1);

namespace RicardoKovalski\SpecPattern\Contracts;

interface Specification
{
    public function isSatisfiedBy($candidate): bool;
}
