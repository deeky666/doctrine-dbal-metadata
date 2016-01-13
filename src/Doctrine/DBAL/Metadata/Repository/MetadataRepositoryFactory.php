<?php

namespace Doctrine\DBAL\Metadata\Repository;

interface MetadataRepositoryFactory
{
    /**
     * @return TableMetadataRepository
     */
    public function getTableRepository();
}
