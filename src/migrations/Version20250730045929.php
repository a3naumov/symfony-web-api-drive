<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250730045929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create drive table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
CREATE TABLE drive (
    id UUID NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)
SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE drive');
    }
}
