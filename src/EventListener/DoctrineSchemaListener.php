<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\EventListener;

use Contao\CoreBundle\Doctrine\Schema\DcaSchemaProvider;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;

class DoctrineSchemaListener
{
    /**
     * @var DcaSchemaProvider
     */
    private $provider;

    public function __construct(DcaSchemaProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Adds the Contao DCA information to the Doctrine schema.
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $event): void
    {
        $this->provider->appendToSchema($event->getSchema());
    }
}
