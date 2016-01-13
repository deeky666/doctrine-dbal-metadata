<?php

namespace Doctrine\DBAL\Metadata\Mapper;

use Doctrine\DBAL\Metadata\Element\TableIdentifier;
use Doctrine\DBAL\Metadata\Element\TableMetadata;

interface TableMetadataMapper
{
    public function alter(TableMetadata $tableMetadata);

    public function create(TableMetadata $tableMetadata);

    public function drop(TableIdentifier $tableIdentifier);

    public function select($criteria = null);
}
