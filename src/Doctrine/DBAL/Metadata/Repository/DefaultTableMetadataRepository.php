<?php

namespace Doctrine\DBAL\Metadata\Repository;

use Doctrine\DBAL\Metadata\Element\TableIdentifier;
use Doctrine\DBAL\Metadata\Element\TableMetadata;
use Doctrine\DBAL\Metadata\Mapper\TableMetadataMapper;

class DefaultTableMetadataRepository implements TableMetadataRepository
{
    /**
     * @var TableMetadataMapper
     */
    private $mapper;

    public function __construct(TableMetadataMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * {@inheritdoc}
     */
    public function add(TableMetadata $tableMetadata)
    {
        $this->mapper->create($tableMetadata);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->mapper->select();
    }

    /**
     * {@inheritdoc}
     */
    public function find(TableIdentifier $tableIdentifier)
    {
        $criteria = $this->createIdentifierCriteria($tableIdentifier);
        $result = $this->mapper->select($criteria);

        return empty($result) ? null : current($result);
    }

    /**
     * {@inheritdoc}
     */
    public function get(TableIdentifier $tableIdentifier)
    {
        $tableMetadata = $this->find($tableIdentifier);

        if (null === $tableMetadata) {
            // throw not found exception
        }

        return $tableMetadata;
    }

    /**
     * {@inheritdoc}
     */
    public function matching($criteria)
    {
        return $this->mapper->select($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function put(TableMetadata $tableMetadata)
    {
        $new = true; // change set computation

        if ($new) {
            $this->add($tableMetadata);

            return;
        }

        $this->mapper->alter($tableMetadata);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(TableIdentifier $tableIdentifier)
    {
        $this->mapper->drop($tableIdentifier);
    }

    private function createIdentifierCriteria(TableIdentifier $tableIdentifier)
    {
        // return criteria
    }
}
