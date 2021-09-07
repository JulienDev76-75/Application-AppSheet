<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210907075633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plan_communication (id INT AUTO_INCREMENT NOT NULL, validation_sophie LONGTEXT DEFAULT NULL, type_activite VARCHAR(255) NOT NULL, type_contrat VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_de_fin DATE DEFAULT NULL, periode VARCHAR(255) DEFAULT NULL, type_operation VARCHAR(255) NOT NULL, operation_nationale VARCHAR(255) NOT NULL, cible VARCHAR(255) NOT NULL, objectif VARCHAR(255) NOT NULL, offre LONGTEXT NOT NULL, cout_com_interne DOUBLE PRECISION NOT NULL, cout_com_externe DOUBLE PRECISION DEFAULT NULL, frais_organisation DOUBLE PRECISION NOT NULL, participation_partenaire DOUBLE PRECISION DEFAULT NULL, cout_total DOUBLE PRECISION NOT NULL, pass DOUBLE PRECISION DEFAULT NULL, cartes DOUBLE PRECISION DEFAULT NULL, chiffre_affaire DOUBLE PRECISION NOT NULL, roi DOUBLE PRECISION DEFAULT NULL, numero_ddc DOUBLE PRECISION DEFAULT NULL, photo LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE plan_communication');
    }
}
