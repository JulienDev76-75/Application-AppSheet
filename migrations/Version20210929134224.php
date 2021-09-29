<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929134224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total DROP FOREIGN KEY FK_C22FE15EA76ED395');
        $this->addSql('ALTER TABLE total DROP FOREIGN KEY FK_C22FE15EF6BD1646');
        $this->addSql('DROP INDEX IDX_C22FE15EF6BD1646 ON total');
        $this->addSql('DROP INDEX IDX_C22FE15EA76ED395 ON total');
        $this->addSql('ALTER TABLE total DROP site_id, DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE total ADD site_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE total ADD CONSTRAINT FK_C22FE15EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE total ADD CONSTRAINT FK_C22FE15EF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('CREATE INDEX IDX_C22FE15EF6BD1646 ON total (site_id)');
        $this->addSql('CREATE INDEX IDX_C22FE15EA76ED395 ON total (user_id)');
    }
}
