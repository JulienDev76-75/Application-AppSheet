<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929130708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total ADD mois VARCHAR(255) NOT NULL, ADD annee INT NOT NULL, ADD satis_globale DOUBLE PRECISION DEFAULT NULL, ADD satis_proprete DOUBLE PRECISION DEFAULT NULL, ADD satis_horaire DOUBLE PRECISION DEFAULT NULL, ADD temperature_douche DOUBLE PRECISION DEFAULT NULL, ADD competence_personnel DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total DROP mois, DROP annee, DROP satis_globale, DROP satis_proprete, DROP satis_horaire, DROP temperature_douche, DROP competence_personnel');
    }
}
