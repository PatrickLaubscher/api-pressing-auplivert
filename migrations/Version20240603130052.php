<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603130052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, raw_material_id INT NOT NULL, prestation_id INT NOT NULL, main_order_id INT NOT NULL, order_line_status_id INT NOT NULL, employee_id INT DEFAULT NULL, qty SMALLINT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_9CE58EE14584665A (product_id), INDEX IDX_9CE58EE1693CA4A7 (raw_material_id), INDEX IDX_9CE58EE19E45C554 (prestation_id), INDEX IDX_9CE58EE154BD7C4D (main_order_id), INDEX IDX_9CE58EE1B3842B7F (order_line_status_id), INDEX IDX_9CE58EE18C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_line_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE1693CA4A7 FOREIGN KEY (raw_material_id) REFERENCES raw_material (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE19E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE154BD7C4D FOREIGN KEY (main_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE1B3842B7F FOREIGN KEY (order_line_status_id) REFERENCES order_line_status (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE18C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE14584665A');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE1693CA4A7');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE19E45C554');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE154BD7C4D');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE1B3842B7F');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE18C03F15C');
        $this->addSql('DROP TABLE order_line');
        $this->addSql('DROP TABLE order_line_status');
    }
}
