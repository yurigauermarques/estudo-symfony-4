<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200815221856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produto (id INT AUTO_INCREMENT NOT NULL, produto_categoria_id INT NOT NULL, nome VARCHAR(50) NOT NULL, valor DOUBLE PRECISION DEFAULT NULL, data_cadastro DATE NOT NULL, situacao VARCHAR(7) NOT NULL, INDEX IDX_5CAC49D748DAC5C5 (produto_categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produto_categoria (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, situacao VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produto ADD CONSTRAINT FK_5CAC49D748DAC5C5 FOREIGN KEY (produto_categoria_id) REFERENCES produto_categoria (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produto DROP FOREIGN KEY FK_5CAC49D748DAC5C5');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE produto_categoria');
    }
}
