<?php

namespace Doctrine\DBAL\Metadata\Repository;

use Doctrine\DBAL\Metadata\Element\TableIdentifier;
use Doctrine\DBAL\Metadata\Element\TableMetadata;

interface TableMetadataRepository
{
    public function add(TableMetadata $tableMetadata);

    public function all();

    public function find(TableIdentifier $tableIdentifier);

    public function get(TableIdentifier $tableIdentifier);

    public function matching($criteria);

    public function put(TableMetadata $tableMetadata);

    public function remove(TableIdentifier $tableIdentifier);
}
