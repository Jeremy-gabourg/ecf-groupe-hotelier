<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412161319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temporary_search ADD suite_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE temporary_search ADD CONSTRAINT FK_68CE39E259CDD37D FOREIGN KEY (suite_id_id) REFERENCES suite (id)');
        $this->addSql('CREATE INDEX IDX_68CE39E259CDD37D ON temporary_search (suite_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temporary_search DROP FOREIGN KEY FK_68CE39E259CDD37D');
        $this->addSql('DROP INDEX IDX_68CE39E259CDD37D ON temporary_search');
        $this->addSql('ALTER TABLE temporary_search DROP suite_id_id');
    }
}
