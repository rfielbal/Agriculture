<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260313104712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE culture (id INT AUTO_INCREMENT NOT NULL, date_culture DATE NOT NULL, date_fin DATE NOT NULL, qte_recoltee INT NOT NULL, parcelle_id INT NOT NULL, production_id INT NOT NULL, INDEX IDX_B6A99CEB4433ED66 (parcelle_id), INDEX IDX_B6A99CEBECC6147F (production_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE element_chimique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(45) NOT NULL, unite_id INT NOT NULL, INDEX IDX_DD3A4BFAEC4A74AB (unite_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE engrais (id INT AUTO_INCREMENT NOT NULL, nom_engrais VARCHAR(75) NOT NULL, unite_id INT NOT NULL, INDEX IDX_A81E4023EC4A74AB (unite_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE epandre (id INT AUTO_INCREMENT NOT NULL, qte_ependu INT NOT NULL, engrais_id INT NOT NULL, parcelle_id INT DEFAULT NULL, date_id INT NOT NULL, INDEX IDX_5F64826F563C4F47 (engrais_id), INDEX IDX_5F64826F4433ED66 (parcelle_id), INDEX IDX_5F64826FB897366B (date_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE production (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, unite_id INT NOT NULL, INDEX IDX_D3EDB1E0EC4A74AB (unite_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEB4433ED66 FOREIGN KEY (parcelle_id) REFERENCES parcelle (id)');
        $this->addSql('ALTER TABLE culture ADD CONSTRAINT FK_B6A99CEBECC6147F FOREIGN KEY (production_id) REFERENCES production (id)');
        $this->addSql('ALTER TABLE element_chimique ADD CONSTRAINT FK_DD3A4BFAEC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id)');
        $this->addSql('ALTER TABLE engrais ADD CONSTRAINT FK_A81E4023EC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826F563C4F47 FOREIGN KEY (engrais_id) REFERENCES engrais (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826F4433ED66 FOREIGN KEY (parcelle_id) REFERENCES parcelle (id)');
        $this->addSql('ALTER TABLE epandre ADD CONSTRAINT FK_5F64826FB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E0EC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEB4433ED66');
        $this->addSql('ALTER TABLE culture DROP FOREIGN KEY FK_B6A99CEBECC6147F');
        $this->addSql('ALTER TABLE element_chimique DROP FOREIGN KEY FK_DD3A4BFAEC4A74AB');
        $this->addSql('ALTER TABLE engrais DROP FOREIGN KEY FK_A81E4023EC4A74AB');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826F563C4F47');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826F4433ED66');
        $this->addSql('ALTER TABLE epandre DROP FOREIGN KEY FK_5F64826FB897366B');
        $this->addSql('ALTER TABLE production DROP FOREIGN KEY FK_D3EDB1E0EC4A74AB');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE element_chimique');
        $this->addSql('DROP TABLE engrais');
        $this->addSql('DROP TABLE epandre');
        $this->addSql('DROP TABLE production');
    }
}
