<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210930122842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total DROP annee, DROP chiffre_affaire, DROP freq, DROP panier_moyen');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total ADD annee INT NOT NULL, ADD chiffre_affaire DOUBLE PRECISION NOT NULL, ADD freq DOUBLE PRECISION NOT NULL, ADD panier_moyen DOUBLE PRECISION NOT NULL');
    }
}
