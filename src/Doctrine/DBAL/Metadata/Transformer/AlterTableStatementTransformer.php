<?php

namespace Doctrine\DBAL\Metadata\Transformer;

use Doctrine\DBAL\Language\AST\Node\Statement\AlterTableStatementNode;
use Doctrine\DBAL\Metadata\Element\TableMetadata;

interface AlterTableStatementTransformer
{
    /**
     * @param TableMetadata $tableMetadata
     *
     * @return AlterTableStatementNode
     */
    public function transformAlterTableStatement(TableMetadata $tableMetadata);
}
