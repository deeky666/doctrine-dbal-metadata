<?php

namespace Doctrine\DBAL\Metadata;

use Doctrine\DBAL\Metadata\Element\TableIdentifier;
use Doctrine\DBAL\Metadata\Element\TableMetadata;
use Doctrine\DBAL\Metadata\Repository\MetadataRepositoryFactory;

class DatabaseMetadataManager
{
    private $metadataRepositoryFactory;

    public function __construct(MetadataRepositoryFactory $metadataRepositoryFactory)
    {
        $this->metadataRepositoryFactory = $metadataRepositoryFactory;
    }

    public function alterTable(TableMetadata $tableMetadata)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->put($tableMetadata);
    }

    public function createTable(TableMetadata $tableMetadata)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->add($tableMetadata);
    }

    public function dropTable(TableIdentifier $tableIdentifier)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->remove($tableIdentifier);
    }

    public function findTable(TableIdentifier $tableIdentifier)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->find($tableIdentifier);
    }

    public function getTable(TableIdentifier $tableIdentifier)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->get($tableIdentifier);
    }

    public function getTables($criteria = null)
    {
        $tableRepository = $this->getTableRepository();

        $tableRepository->matching($criteria);
    }

    /**
     * @return Repository\TableMetadataRepository
     */
    private function getTableRepository()
    {
        return $tableRepository = $this->metadataRepositoryFactory->getTableRepository();
    }
}
