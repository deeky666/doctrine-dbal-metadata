<?php

namespace Doctrine\DBAL\Connection;

use Doctrine\DBAL\Language\AST\Node\Statement\StatementNode;

interface Connection
{
    public function executeStatement(StatementNode $statement);
}
