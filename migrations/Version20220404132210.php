<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404132210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE establishment (id INT AUTO_INCREMENT NOT NULL, manager_id_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', establishment_name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, establishment_description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_DBEFB1EE569B5E6D (manager_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, suite_id_id INT NOT NULL, gallery_name VARCHAR(255) NOT NULL, highlighted_photo TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_472B783A59CDD37D (suite_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_name VARCHAR(255) NOT NULL, content LONGBLOB NOT NULL, INDEX IDX_6A2CA10C4E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', suite_id_id INT NOT NULL, done_on DATETIME NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, state VARCHAR(255) NOT NULL, INDEX IDX_42C849559D86650F (user_id_id), INDEX IDX_42C8495559CDD37D (suite_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_332CA4DDD60322AC (role_id), INDEX IDX_332CA4DDA76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, establishment_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, suite_description LONGTEXT NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_153CE426FB55A222 (establishment_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EE569B5E6D FOREIGN KEY (manager_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A59CDD37D FOREIGN KEY (suite_id_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495559CDD37D FOREIGN KEY (suite_id_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426FB55A222 FOREIGN KEY (establishment_id_id) REFERENCES establishment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426FB55A222');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C4E7AF8F');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDD60322AC');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A59CDD37D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495559CDD37D');
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EE569B5E6D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559D86650F');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDA76ED395');
        $this->addSql('DROP TABLE establishment');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP TABLE user');
    }
}
