<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603131719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('DROP INDEX IDX_F52993989395C3F3 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP customer_id');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE18C03F15C');
        $this->addSql('DROP INDEX IDX_9CE58EE18C03F15C ON order_line');
        $this->addSql('ALTER TABLE order_line DROP employee_id');
    }

    public function down(Schema $schema): void
    {

    }
}
