<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914153226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE satisfaction ADD CONSTRAINT FK_8A8E0C13A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8A8E0C13A76ED395 ON satisfaction (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction DROP FOREIGN KEY FK_8A8E0C13A76ED395');
        $this->addSql('DROP INDEX IDX_8A8E0C13A76ED395 ON satisfaction');
        $this->addSql('ALTER TABLE satisfaction DROP user_id');
    }
}
