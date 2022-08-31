<?php declare(strict_types=1);

include_once __DIR__ . '/../src/ObserverSubject.php';

use PHPUnit\Framework\TestCase;

class ObserverSubjectTest extends TestCase
{
    public function testObserversAreUpdated()
    {


        /**
         *Create mock for @$observer Observer Class
         * We only mock the update()
         */
        $observer = $this->createMock(Observer::class);

        /**
         *Setting up expectations for update()
         * Will be called once with @param string 'reaction: 01'
         */
        $observer->expects(self::once())
            ->method('update')
            ->with(self::equalTo('reaction: 01'))
        ;

        /**
         *Create Subject object and attach mock to it @$observer Observer Class
         */
        $subject = new Subject('HttpClient::class');
        $subject->attach($observer);

        /**
         * Call the stimuli() method on $subject object
         * which we expect to call the mocked Observer object's update() method
         * with the string 'reaction: 01'
         */
        $subject->stimuli();
    }


}
