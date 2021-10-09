<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008141823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pass CHANGE annee user_id INT NOT NULL');
        $this->addSql('ALTER TABLE pass ADD CONSTRAINT FK_CE70D424A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CE70D424A76ED395 ON pass (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pass DROP FOREIGN KEY FK_CE70D424A76ED395');
        $this->addSql('DROP INDEX IDX_CE70D424A76ED395 ON pass');
        $this->addSql('ALTER TABLE pass CHANGE user_id annee INT NOT NULL');
    }
}
