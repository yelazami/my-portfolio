<?php

namespace App\Event;

use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class DoctrineEvent implements EventSubscriberInterface
{
    public function getSubscribedEvents() {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $event) {
        $entity = $event->getObject();
        $this->setTimestamps($entity, new: true);
    }

    public function preUpdate(LifecycleEventArgs $event) {
        $entity = $event->getObject();
        $this->setTimestamps($entity);
    }
    
    private function setTimestamps(Object $entity, bool $new = false): void
    {
        $entity->setUpdatedAt(new \DateTimeImmutable());

        if(true === $new) {

            $entity->setCreatedAt(new \DateTimeImmutable());
        }
    }

}