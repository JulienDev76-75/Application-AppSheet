<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916144249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction ADD trimestre VARCHAR(255) NOT NULL, DROP t1, DROP t2, DROP t3, DROP t4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE satisfaction ADD t1 INT DEFAULT NULL, ADD t2 INT DEFAULT NULL, ADD t3 INT DEFAULT NULL, ADD t4 INT DEFAULT NULL, DROP trimestre');
    }
}
