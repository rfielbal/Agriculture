<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260313102659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, element_id INT DEFAULT NULL, engrais_id INT DEFAULT NULL, INDEX IDX_62EF7CBA1F1F2A24 (element_id), INDEX IDX_62EF7CBA563C4F47 (engrais_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA1F1F2A24 FOREIGN KEY (element_id) REFERENCES element_chimique (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA563C4F47 FOREIGN KEY (engrais_id) REFERENCES engrais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA1F1F2A24');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA563C4F47');
        $this->addSql('DROP TABLE posseder');
    }
}
