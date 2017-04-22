<?php

namespace seregazhuk\HeadHunterApi\Contracts;

interface HttpInterface
{
    /**
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array|null
     */
    public function get($uri, $params = [], $headers = null);


    /**
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array|null
     */
    public function post($uri, $params = [], $headers = null);

    /**
     * @param string $uri
     * @param array|null $headers
     * @return array|null
     */
    public function delete($uri, $headers = null);
}