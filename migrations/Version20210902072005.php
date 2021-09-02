<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210902072005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE satisfaction (id INT AUTO_INCREMENT NOT NULL, site VARCHAR(255) NOT NULL, trimestre VARCHAR(255) NOT NULL, satis_globale DOUBLE PRECISION DEFAULT NULL, satis_proprete DOUBLE PRECISION DEFAULT NULL, competence_du_personnel DOUBLE PRECISION DEFAULT NULL, temperature_douche DOUBLE PRECISION DEFAULT NULL, satis_horaires DOUBLE PRECISION DEFAULT NULL, repondant DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE satisfaction');
    }
}
