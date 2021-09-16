<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916122233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction ADD site_id INT NOT NULL, DROP site');
        $this->addSql('ALTER TABLE satisfaction ADD CONSTRAINT FK_8A8E0C13F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('CREATE INDEX IDX_8A8E0C13F6BD1646 ON satisfaction (site_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction DROP FOREIGN KEY FK_8A8E0C13F6BD1646');
        $this->addSql('DROP INDEX IDX_8A8E0C13F6BD1646 ON satisfaction');
        $this->addSql('ALTER TABLE satisfaction ADD site VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP site_id');
    }
}
