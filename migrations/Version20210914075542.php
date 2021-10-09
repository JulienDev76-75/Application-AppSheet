<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914075542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux CHANGE date date DATETIME NOT NULL');
        $this->addSql('CREATE FULLTEXT INDEX IDX_BC7D6CF62E2C0F7277B93EF9E54D5CE211BBFFE5 ON swot (forces, faiblesses, opportunites, menaces)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux CHANGE date date DATE NOT NULL');
        $this->addSql('DROP INDEX IDX_BC7D6CF62E2C0F7277B93EF9E54D5CE211BBFFE5 ON swot');
    }
}
