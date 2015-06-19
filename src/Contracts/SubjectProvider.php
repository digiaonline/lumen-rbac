<?php namespace Nord\Lumen\Rbac\Contracts;

use Crisu83\Overseer\Entity\Subject;

interface SubjectProvider
{

    /**
     * @return Subject
     */
    public function getSubject();
}
