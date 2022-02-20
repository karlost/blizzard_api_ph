<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use Error;
use stdClass;

class Auction extends GenericDataEndpoint
{
    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error('The Auction endpoint does not have an index method.');
    }

    /**
     * Returns Returns all active auctions for a connected realm
     * @param int $id The ID of the connected realm
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/auctions", $this->defaultOptions($options));
    }

    protected function endpointSetup($options = [])
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_HOUR->value;
        $this->endpoint = 'connected-realm';
    }
}
