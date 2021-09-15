<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915102138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pass ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pass ADD CONSTRAINT FK_CE70D424F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('CREATE INDEX IDX_CE70D424F6BD1646 ON pass (site_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pass DROP FOREIGN KEY FK_CE70D424F6BD1646');
        $this->addSql('DROP INDEX IDX_CE70D424F6BD1646 ON pass');
        $this->addSql('ALTER TABLE pass DROP site_id');
    }
}
