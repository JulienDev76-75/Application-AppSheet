<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914152435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan_communication ADD site_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plan_communication ADD CONSTRAINT FK_F7AEA9D8F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE plan_communication ADD CONSTRAINT FK_F7AEA9D8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F7AEA9D8F6BD1646 ON plan_communication (site_id)');
        $this->addSql('CREATE INDEX IDX_F7AEA9D8A76ED395 ON plan_communication (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan_communication DROP FOREIGN KEY FK_F7AEA9D8F6BD1646');
        $this->addSql('ALTER TABLE plan_communication DROP FOREIGN KEY FK_F7AEA9D8A76ED395');
        $this->addSql('DROP INDEX IDX_F7AEA9D8F6BD1646 ON plan_communication');
        $this->addSql('DROP INDEX IDX_F7AEA9D8A76ED395 ON plan_communication');
        $this->addSql('ALTER TABLE plan_communication DROP site_id, DROP user_id');
    }
}
