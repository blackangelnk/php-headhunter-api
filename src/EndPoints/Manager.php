<?php

namespace seregazhuk\HeadHunterApi\EndPoints;

use seregazhuk\HeadHunterApi\Traits\ResolvesCurrentUser;

class Manager extends Endpoint
{
    use ResolvesCurrentUser;

    const RESOURCE = '/employers';

    /**
     * Get manager settings
     * @param integer $managerId
     * @return array
     */
    public function preferences($managerId = null)
    {
        return $this->getManagerResource('settings', $managerId);
    }

    /**
     * Get manager method access
     * @param integer $managerId
     * @return array
     */
    public function access($managerId = null)
    {
        return $this->getManagerResource('method_access', $managerId);
    }

    /**
     * Get manager method access
     * @param integer $managerId
     * @return array
     */
    public function resumeLimits($managerId = null)
    {
        return $this->getManagerResource('limits/resume', $managerId);
    }

    /**
     * @param string $resource
     * @param integer $managerId
     * @return array
     */
    private function getManagerResource(string $resource, $managerId = null)
    {
        $employerId = $this->getCurrentEmployerId();
        $managerId = $managerId ?: $this->getCurrentManagerId();

        $uri = str_replace(
            ['{employer_id}', '{manager_id}'],
            [$employerId, $managerId],
            '{employer_id}/managers/{manager_id}/'.$resource
        );

        return $this->getResource($uri);
    }
}