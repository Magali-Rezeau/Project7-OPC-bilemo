<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Allows to automatically set the company when creating a user
 */
class CurrentCompanyForAddedUser implements EventSubscriberInterface
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['currentCompanyForUser', EventPriorities::PRE_VALIDATE]
        ];
    }
    public function currentCompanyForUser(ViewEvent $event):void
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        
        if($user instanceof User && Request::METHOD_POST === $method) {
            $user->setCompany($this->security->getUser());
        }
    }
}
