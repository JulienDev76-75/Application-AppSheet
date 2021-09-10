<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908140528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux ADD CONSTRAINT FK_5A31B62BF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('CREATE INDEX IDX_5A31B62BF6BD1646 ON cartes_cadeaux (site_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes_cadeaux DROP FOREIGN KEY FK_5A31B62BF6BD1646');
        $this->addSql('DROP INDEX IDX_5A31B62BF6BD1646 ON cartes_cadeaux');
    }
}
