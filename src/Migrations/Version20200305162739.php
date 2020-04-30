<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305162739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Panier CHANGE prix_total prix_total INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE Concerner DROP FOREIGN KEY Concerner_Commande1_FK');
        $this->addSql('ALTER TABLE Concerner DROP FOREIGN KEY Concerner_Panier0_FK');
        $this->addSql('DROP INDEX idx_29182ac522608f00 ON Concerner');
        $this->addSql('CREATE INDEX IDX_ABE9A86622608F00 ON Concerner (prix_total)');
        $this->addSql('DROP INDEX concerner_commande1_fk ON Concerner');
        $this->addSql('CREATE INDEX IDX_ABE9A8663E314AE8 ON Concerner (id_commande)');
        $this->addSql('ALTER TABLE Concerner ADD CONSTRAINT Concerner_Commande1_FK FOREIGN KEY (id_commande) REFERENCES Commande (id_commande)');
        $this->addSql('ALTER TABLE Concerner ADD CONSTRAINT Concerner_Panier0_FK FOREIGN KEY (prix_total) REFERENCES Panier (prix_total)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE concerner DROP FOREIGN KEY FK_ABE9A86622608F00');
        $this->addSql('ALTER TABLE concerner DROP FOREIGN KEY FK_ABE9A8663E314AE8');
        $this->addSql('DROP INDEX idx_abe9a8663e314ae8 ON concerner');
        $this->addSql('CREATE INDEX Concerner_Commande1_FK ON concerner (id_commande)');
        $this->addSql('DROP INDEX idx_abe9a86622608f00 ON concerner');
        $this->addSql('CREATE INDEX IDX_29182AC522608F00 ON concerner (prix_total)');
        $this->addSql('ALTER TABLE concerner ADD CONSTRAINT FK_ABE9A86622608F00 FOREIGN KEY (prix_total) REFERENCES Panier (prix_total)');
        $this->addSql('ALTER TABLE concerner ADD CONSTRAINT FK_ABE9A8663E314AE8 FOREIGN KEY (id_commande) REFERENCES Commande (id_commande)');
        $this->addSql('ALTER TABLE Panier CHANGE prix_total prix_total INT NOT NULL');
    }
}
