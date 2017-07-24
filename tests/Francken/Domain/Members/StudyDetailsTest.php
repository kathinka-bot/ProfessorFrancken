<?php

declare(strict_types=1);

namespace Tests\Francken\Domain\Members;

use Francken\Domain\Members\StudyDetails;
use DateTimeImmutable;
use Francken\Tests\SetupReconstitution;

class StudyDetailsTest extends \PHPUnit_Framework_TestCase
{
    use SetupReconstitution;

    /** @test */
    public function it_is_constructed_with_study_details()
    {
        $studyDetails = new StudyDetails(
            's2218356',
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011'),
            new DateTimeImmutable('01-08-2014')
        );

        $this->assertEquals('Msc Applied Mathematics', $studyDetails->study());
        $this->assertEquals(new DateTimeImmutable('01-08-2011'), $studyDetails->startDate());
        $this->assertEquals(new DateTimeImmutable('01-08-2014'), $studyDetails->graduationDate());
        $this->assertEquals('s2218356', $studyDetails->studentNumber());
    }

    /** @test */
    function the_graduation_date_is_optional()
    {
        $studyDetails = new StudyDetails(
            's2218356',
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011')
        );

        $this->assertEquals(null, $studyDetails->graduationDate());
    }


    /** @test */
    public function it_is_serializable()
    {
        $studyDetails = new StudyDetails(
            's2218356',
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011'),
            new DateTimeImmutable('01-08-2014')
        );

        $this->assertEquals(
            $studyDetails,
            StudyDetails::deserialize($studyDetails->serialize())
        );
    }
}
