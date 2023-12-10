<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209233039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE figurine_stats ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE paint ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE figurine_stats DROP name');
        $this->addSql('ALTER TABLE image DROP name');
        $this->addSql('ALTER TABLE paint DROP type');
    }
}
