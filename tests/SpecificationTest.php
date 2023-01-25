<?php

class SpecificationTest extends \PHPUnit\Framework\TestCase
{
    public function testSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->isSatisfiedBy(new stdClass));
        $this->assertFalse($falseSpec->isSatisfiedBy(new stdClass));
    }

    public function testNotSpecification()
    {
        $notTrueSpec  = (new BoolSpecification(true))->not();
        $notFalseSpec = (new BoolSpecification(false))->not();

        $this->assertFalse($notTrueSpec->isSatisfiedBy(new stdClass));
        $this->assertTrue($notFalseSpec->isSatisfiedBy(new stdClass));
    }

    public function testAndSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->and($trueSpec)->isSatisfiedBy(new stdClass));
        $this->assertFalse($trueSpec->and($falseSpec)->isSatisfiedBy(new stdClass));
    }

    public function testOrSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->or($trueSpec)->isSatisfiedBy(new stdClass));
        $this->assertTrue($trueSpec->or($falseSpec)->isSatisfiedBy(new stdClass));
    }
}

class BoolSpecification extends \RicardoKovalski\SpecPattern\CompositeSpecification
{
    private bool $bool;

    public function __construct($bool)
    {
        $this->bool = $bool;
    }

    public function isSatisfiedBy($candidate): bool
    {
        return $this->bool;
    }
}
