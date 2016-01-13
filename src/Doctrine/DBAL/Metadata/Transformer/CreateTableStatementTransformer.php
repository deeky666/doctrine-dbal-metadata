<?php

namespace Doctrine\DBAL\Metadata\Transformer;

use Doctrine\DBAL\Language\AST\Node\Statement\CreateTableStatementNode;
use Doctrine\DBAL\Metadata\Element\TableMetadata;

interface CreateTableStatementTransformer
{
    /**
     * @param TableMetadata $tableMetadata
     *
     * @return CreateTableStatementNode
     */
    public function transformCreateTableStatement(TableMetadata $tableMetadata);
}
