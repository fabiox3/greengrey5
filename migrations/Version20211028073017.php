<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211028073017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oliveto_details (id INT AUTO_INCREMENT NOT NULL, code_id INT NOT NULL, categoria VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, data DATE NOT NULL, rating INT DEFAULT NULL, INDEX IDX_1BEB0B4C27DAFE17 (code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oliveto_details ADD CONSTRAINT FK_1BEB0B4C27DAFE17 FOREIGN KEY (code_id) REFERENCES oliveto (id)');
        $this->addSql('ALTER TABLE raccolta CHANGE kg_olive kg_olive DOUBLE PRECISION NOT NULL, CHANGE kg_olio kg_olio INT NOT NULL, CHANGE resa_lt_qt resa_lt_qt DOUBLE PRECISION NOT NULL, CHANGE litri_teorici litri_teorici DOUBLE PRECISION NOT NULL, CHANGE litri_reali litri_reali DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE oliveto_details');
        $this->addSql('ALTER TABLE raccolta CHANGE kg_olive kg_olive NUMERIC(10, 2) DEFAULT NULL, CHANGE kg_olio kg_olio NUMERIC(10, 2) DEFAULT NULL, CHANGE resa_lt_qt resa_lt_qt NUMERIC(10, 2) DEFAULT NULL, CHANGE litri_teorici litri_teorici NUMERIC(10, 2) DEFAULT NULL, CHANGE litri_reali litri_reali NUMERIC(10, 2) DEFAULT NULL');
    }
}
