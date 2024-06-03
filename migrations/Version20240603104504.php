<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603104504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, zip_code VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civility (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, abrevation VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, nationality_id INT NOT NULL, employee_status_id INT NOT NULL, datebirth DATE NOT NULL, address VARCHAR(255) NOT NULL, social_security_number VARCHAR(13) NOT NULL, creation_date DATE NOT NULL, INDEX IDX_5D9F75A18BAC62AF (city_id), INDEX IDX_5D9F75A11C9DA55 (nationality_id), INDEX IDX_5D9F75A16E6768FF (employee_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, civility_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, INDEX IDX_8D93D64923D6A298 (civility_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A18BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A11C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A16E6768FF FOREIGN KEY (employee_status_id) REFERENCES employee_status (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A18BAC62AF');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A11C9DA55');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A16E6768FF');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE civility');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE employee_status');
        $this->addSql('DROP TABLE nationality');
        $this->addSql('DROP TABLE `user`');
    }
}
