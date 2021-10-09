<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915095906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rig ADD site_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rig ADD CONSTRAINT FK_CFDD4139F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE rig ADD CONSTRAINT FK_CFDD4139A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CFDD4139F6BD1646 ON rig (site_id)');
        $this->addSql('CREATE INDEX IDX_CFDD4139A76ED395 ON rig (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rig DROP FOREIGN KEY FK_CFDD4139F6BD1646');
        $this->addSql('ALTER TABLE rig DROP FOREIGN KEY FK_CFDD4139A76ED395');
        $this->addSql('DROP INDEX IDX_CFDD4139F6BD1646 ON rig');
        $this->addSql('DROP INDEX IDX_CFDD4139A76ED395 ON rig');
        $this->addSql('ALTER TABLE rig DROP site_id, DROP user_id');
    }
}
