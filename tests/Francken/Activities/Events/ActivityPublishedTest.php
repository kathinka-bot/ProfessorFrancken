<?php

declare(strict_types=1);

namespace Tests\Francken\Activities\Events;

use Tests\SetupReconstitution;
use Francken\Domain\Activities\ActivityId;
use Francken\Domain\Activities\Events\ActivityPublished;

class ActivityPublishedTest extends \PHPUnit_Framework_TestCase
{
    use SetupReconstitution;

    /**
     * @test
     */
    public function it_happend_to_an_activity()
    {
        $id = ActivityId::generate();
        $event = new ActivityPublished($id);

        $this->assertEquals($id, $event->activityId());
    }

    /**
     * @test
     */
    public function it_is_serializable()
    {
        $id = ActivityId::generate();
        $event = new ActivityPublished($id);

        $this->assertEquals(
            $event,
            ActivityPublished::deserialize($event->serialize())
        );
    }
}
