<?php

namespace Doctrine\DBAL\Metadata\Transformer;

use Doctrine\DBAL\Language\AST\Node\Statement\DropTableStatementNode;
use Doctrine\DBAL\Metadata\Element\TableIdentifier;

interface DropTableStatementTransformer
{
    /**
     * @param TableIdentifier $tableIdentifier
     *
     * @return DropTableStatementNode
     */
    public function transformDropTableStatement(TableIdentifier $tableIdentifier);
}
