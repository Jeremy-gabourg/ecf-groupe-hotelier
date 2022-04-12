<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412160019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE temporary_search (id INT AUTO_INCREMENT NOT NULL, establishment_id_id INT NOT NULL, arival_date DATE NOT NULL, departure_date DATE NOT NULL, INDEX IDX_68CE39E2FB55A222 (establishment_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temporary_search ADD CONSTRAINT FK_68CE39E2FB55A222 FOREIGN KEY (establishment_id_id) REFERENCES establishment (id)');
        $this->addSql('ALTER TABLE contact_message ADD is_opened TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE temporary_search');
        $this->addSql('ALTER TABLE contact_message DROP is_opened');
    }
}
