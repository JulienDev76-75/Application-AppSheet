<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921134934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sites_cartes_cadeaux (sites_id INT NOT NULL, cartes_cadeaux_id INT NOT NULL, INDEX IDX_38CF9DFA7838E496 (sites_id), INDEX IDX_38CF9DFAB118656F (cartes_cadeaux_id), PRIMARY KEY(sites_id, cartes_cadeaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sites_cartes_cadeaux ADD CONSTRAINT FK_38CF9DFA7838E496 FOREIGN KEY (sites_id) REFERENCES sites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sites_cartes_cadeaux ADD CONSTRAINT FK_38CF9DFAB118656F FOREIGN KEY (cartes_cadeaux_id) REFERENCES cartes_cadeaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE swot CHANGE annee annee INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sites_cartes_cadeaux');
        $this->addSql('ALTER TABLE swot CHANGE annee annee INT NOT NULL');
    }
}
