<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210902123232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sites CHANGE site_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE sites ADD CONSTRAINT FK_BC00AA63A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BC00AA63A76ED395 ON sites (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sites DROP FOREIGN KEY FK_BC00AA63A76ED395');
        $this->addSql('DROP INDEX IDX_BC00AA63A76ED395 ON sites');
        $this->addSql('ALTER TABLE sites CHANGE user_id site_id INT NOT NULL');
    }
}
