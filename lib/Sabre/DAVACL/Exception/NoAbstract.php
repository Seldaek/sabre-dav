<?php

namespace Sabre\DAVACL\Exception;

use Sabre\DAV;

/**
 * This exception is thrown when a user tries to set a privilege that's marked
 * as abstract.
 *
 * @package Sabre
 * @subpackage DAVACL
 * @copyright Copyright (C) 2007-2012 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class NoAbstract extends DAV\Exception\PreconditionFailed {

    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {DAV:}no-abstract element as defined in rfc3744
     *
     * @param Sabre\DAV\Server $server
     * @param DOMElement $errorNode
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $errorNode) {

        $doc = $errorNode->ownerDocument;

        $np = $doc->createElementNS('DAV:','d:no-abstract');
        $errorNode->appendChild($np);

    }

}
