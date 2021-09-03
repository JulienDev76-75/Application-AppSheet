<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903125559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE swot DROP FOREIGN KEY FK_BC7D6CF67838E496');
        $this->addSql('DROP INDEX UNIQ_BC7D6CF67838E496 ON swot');
        $this->addSql('ALTER TABLE swot CHANGE sites_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE swot ADD CONSTRAINT FK_BC7D6CF6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BC7D6CF6A76ED395 ON swot (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE swot DROP FOREIGN KEY FK_BC7D6CF6A76ED395');
        $this->addSql('DROP INDEX IDX_BC7D6CF6A76ED395 ON swot');
        $this->addSql('ALTER TABLE swot CHANGE user_id sites_id INT NOT NULL');
        $this->addSql('ALTER TABLE swot ADD CONSTRAINT FK_BC7D6CF67838E496 FOREIGN KEY (sites_id) REFERENCES sites (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC7D6CF67838E496 ON swot (sites_id)');
    }
}
