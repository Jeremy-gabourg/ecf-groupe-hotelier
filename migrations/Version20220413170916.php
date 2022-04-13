<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413170916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery ADD establishment_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783AFB55A222 FOREIGN KEY (establishment_id_id) REFERENCES establishment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_472B783AFB55A222 ON gallery (establishment_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783AFB55A222');
        $this->addSql('DROP INDEX UNIQ_472B783AFB55A222 ON gallery');
        $this->addSql('ALTER TABLE gallery DROP establishment_id_id');
    }
}
