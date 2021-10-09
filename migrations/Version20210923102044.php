<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923102044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux CHANGE annee annee INT NOT NULL');
        $this->addSql('ALTER TABLE plan_communication ADD annee INT NOT NULL, DROP date_debut, DROP date_de_fin');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux CHANGE annee annee DATE NOT NULL');
        $this->addSql('ALTER TABLE plan_communication ADD date_debut DATE NOT NULL, ADD date_de_fin DATE DEFAULT NULL, DROP annee');
    }
}
