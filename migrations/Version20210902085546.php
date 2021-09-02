<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210902085546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sites (id INT AUTO_INCREMENT NOT NULL, ville VARCHAR(255) NOT NULL, type_contrat VARCHAR(255) NOT NULL, type_societe VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) NOT NULL, nom_du_site VARCHAR(255) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) NOT NULL, date_debut DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', date_fin DATE DEFAULT NULL, date_premier_contrat DATE NOT NULL, ctrl_acces VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD poste VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sites');
        $this->addSql('ALTER TABLE user DROP poste');
    }
}
