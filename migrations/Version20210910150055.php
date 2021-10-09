<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210910150055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux DROP FOREIGN KEY FK_5A31B62BF2A652A5');
        $this->addSql('DROP INDEX IDX_5A31B62BF2A652A5 ON cartes_cadeaux');
        $this->addSql('ALTER TABLE cartes_cadeaux ADD site_id INT NOT NULL, DROP dr_id, DROP site');
        $this->addSql('ALTER TABLE cartes_cadeaux ADD CONSTRAINT FK_5A31B62BF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('CREATE INDEX IDX_5A31B62BF6BD1646 ON cartes_cadeaux (site_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux DROP FOREIGN KEY FK_5A31B62BF6BD1646');
        $this->addSql('DROP INDEX IDX_5A31B62BF6BD1646 ON cartes_cadeaux');
        $this->addSql('ALTER TABLE cartes_cadeaux ADD dr_id INT DEFAULT NULL, ADD site VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP site_id');
        $this->addSql('ALTER TABLE cartes_cadeaux ADD CONSTRAINT FK_5A31B62BF2A652A5 FOREIGN KEY (dr_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A31B62BF2A652A5 ON cartes_cadeaux (dr_id)');
    }
}
