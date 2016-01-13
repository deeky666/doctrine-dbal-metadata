<?php

namespace Doctrine\DBAL\Metadata\Transformer;

interface TableMetadataAstTransformer extends
    CreateTableStatementTransformer,
    AlterTableStatementTransformer,
    DropTableStatementTransformer
{
}
