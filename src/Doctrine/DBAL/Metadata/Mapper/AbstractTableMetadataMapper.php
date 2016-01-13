<?php

namespace Doctrine\DBAL\Metadata\Mapper;

use Doctrine\DBAL\Connection\Connection;
use Doctrine\DBAL\Metadata\Element\TableIdentifier;
use Doctrine\DBAL\Metadata\Element\TableMetadata;
use Doctrine\DBAL\Metadata\Transformer\TableMetadataAstTransformer;

abstract class AbstractTableMetadataMapper implements TableMetadataMapper
{
    /**
     * @var TableMetadataAstTransformer
     */
    private $astTransformer;

    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection, TableMetadataAstTransformer $astTransformer)
    {
        $this->connection = $connection;
        $this->astTransformer = $astTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function alter(TableMetadata $tableMetadata)
    {
        $alterTableStatement = $this->astTransformer->transformAlterTableStatement($tableMetadata);

        $this->connection->executeStatement($alterTableStatement);
    }

    /**
     * {@inheritdoc}
     */
    public function create(TableMetadata $tableMetadata)
    {
        $createTableStatement = $this->astTransformer->transformCreateTableStatement($tableMetadata);

        $this->connection->executeStatement($createTableStatement);
    }

    /**
     * {@inheritdoc}
     */
    public function drop(TableIdentifier $tableIdentifier)
    {
        $dropTableStatement = $this->astTransformer->transformDropTableStatement($tableIdentifier);

        $this->connection->executeStatement($dropTableStatement);
    }
}
