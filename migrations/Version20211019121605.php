<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019121605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sites_cartes_cadeaux');
        $this->addSql('DROP TABLE total_cartes_cadeaux');
        $this->addSql('ALTER TABLE plan_communication DROP annee');
        $this->addSql('ALTER TABLE rig ADD periode VARCHAR(255) NOT NULL, DROP mois, DROP annee');
        $this->addSql('ALTER TABLE total DROP mois');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sites_cartes_cadeaux (sites_id INT NOT NULL, cartes_cadeaux_id INT NOT NULL, INDEX IDX_38CF9DFA7838E496 (sites_id), INDEX IDX_38CF9DFAB118656F (cartes_cadeaux_id), PRIMARY KEY(sites_id, cartes_cadeaux_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE total_cartes_cadeaux (id INT AUTO_INCREMENT NOT NULL, nombre_cartes_vendues DOUBLE PRECISION DEFAULT NULL, valorisation_ventes DOUBLE PRECISION DEFAULT NULL, nombre_carte_utilisees DOUBLE PRECISION DEFAULT NULL, valorisation_utilisation DOUBLE PRECISION DEFAULT NULL, solde DOUBLE PRECISION DEFAULT NULL, periode VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sites_cartes_cadeaux ADD CONSTRAINT FK_38CF9DFA7838E496 FOREIGN KEY (sites_id) REFERENCES sites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sites_cartes_cadeaux ADD CONSTRAINT FK_38CF9DFAB118656F FOREIGN KEY (cartes_cadeaux_id) REFERENCES cartes_cadeaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plan_communication ADD annee INT NOT NULL');
        $this->addSql('ALTER TABLE rig ADD mois VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD annee INT NOT NULL, DROP periode');
        $this->addSql('ALTER TABLE total ADD mois VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
