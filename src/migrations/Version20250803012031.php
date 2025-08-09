<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250803012031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create resource table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
CREATE TABLE resource (
    id UUID NOT NULL,
    drive_id UUID NOT NULL,
    parent_id UUID DEFAULT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)
SQL);
        $this->addSql('CREATE INDEX IDX_BC91F41686E5E0C4 ON resource (drive_id)');
        $this->addSql('CREATE INDEX IDX_BC91F416727ACA70 ON resource (parent_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE resource');
    }
}
