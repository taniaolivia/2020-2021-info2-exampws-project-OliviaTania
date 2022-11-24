<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119143037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, lieudestination VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, nompart VARCHAR(255) NOT NULL, prenompart VARCHAR(255) NOT NULL, adresse_part VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, destination_id INT NOT NULL, refvoyage VARCHAR(255) NOT NULL, datedepartvoyage DATE NOT NULL, resumevoyage VARCHAR(255) NOT NULL, INDEX IDX_3F9D8955816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_participant (voyage_id INT NOT NULL, participant_id INT NOT NULL, INDEX IDX_E48BF3B368C9E5AF (voyage_id), INDEX IDX_E48BF3B39D1C3019 (participant_id), PRIMARY KEY(voyage_id, participant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE voyage_participant ADD CONSTRAINT FK_E48BF3B368C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_participant ADD CONSTRAINT FK_E48BF3B39D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955816C6140');
        $this->addSql('ALTER TABLE voyage_participant DROP FOREIGN KEY FK_E48BF3B39D1C3019');
        $this->addSql('ALTER TABLE voyage_participant DROP FOREIGN KEY FK_E48BF3B368C9E5AF');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE voyage');
        $this->addSql('DROP TABLE voyage_participant');
    }
}
