<?php
namespace Doctrineum\Strict\String;

use Doctrine\DBAL\Types\Type;
use Doctrineum\Tests\Strict\String\StrictStringEnumTestTrait;
use Doctrineum\Tests\Strict\String\StrictStringEnumTypeTestTrait;

class SelfTypedStrictStringEnumTest extends \PHPUnit_Framework_TestCase
{
    use StrictStringEnumTestTrait;
    use StrictStringEnumTypeTestTrait;

    /**
     * Overloaded parent test to test self-registration
     *
     * @test
     */
    public function can_be_registered()
    {
        SelfTypedStrictStringEnum::registerSelf();
        $this->assertTrue(Type::hasType(SelfTypedStrictStringEnum::getTypeName()));
    }

    protected function getInheritedEnum($value)
    {
        if (!Type::hasType(TestSubTypeSelfTypedStrictStringEnum::getTypeName())) {
            TestSubTypeSelfTypedStrictStringEnum::registerSelf();
        }
        $enum = TestSubTypeSelfTypedStrictStringEnum::getEnum($value);

        return $enum;
    }

    protected function getTestSubTypeClass()
    {
        return TestSubTypeSelfTypedStrictStringEnum::class;
    }
}

/** inner */
class TestSubTypeSelfTypedStrictStringEnum extends SelfTypedStrictStringEnum
{

}
