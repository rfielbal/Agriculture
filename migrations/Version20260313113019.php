<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260313113019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE culture (id INT AUTO_INCREMENT NOT NULL, date_culture DATE NOT NULL, date_fin DATE NOT NULL, qte_recoltee INT NOT NULL, parcelle_id INT NOT NULL, production_id INT NOT NULL, INDEX IDX_B6A99CEB4433ED66 (parcelle_id), INDEX IDX_B6A99CEBECC6147F (production_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, valeur INT NOT NULL, element_id INT DEFAULT NULL, engrais_id INT DEFAULT NULL, INDEX IDX_62EF7CBA1F1F2A24 (element_id), INDEX IDX_62EF7CBA563C4F47 (engrais_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEB4433ED66 FOREIGN KEY (parcelle_id) REFERENCES parcelle (id)');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEBECC6147F FOREIGN KEY (production_id) REFERENCES production (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA1F1F2A24 FOREIGN KEY (element_id) REFERENCES element_chimique (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA563C4F47 FOREIGN KEY (engrais_id) REFERENCES engrais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEB4433ED66');
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEBECC6147F');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA1F1F2A24');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA563C4F47');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE posseder');
    }
}
