<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612085526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE betaal (id INT AUTO_INCREMENT NOT NULL, userid INT NOT NULL, soort VARCHAR(255) NOT NULL, rekeningnr VARCHAR(25) NOT NULL, betaaldate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras (id INT AUTO_INCREMENT NOT NULL, omschrijving LONGTEXT NOT NULL, meerprijs INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kamer (id INT AUTO_INCREMENT NOT NULL, soortid_id INT NOT NULL, prijs DOUBLE PRECISION NOT NULL, INDEX IDX_4DD4F6A626C74D10 (soortid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kamer_extras (kamer_id INT NOT NULL, extras_id INT NOT NULL, INDEX IDX_2D13C77B78ECB459 (kamer_id), INDEX IDX_2D13C77B955D4F3F (extras_id), PRIMARY KEY(kamer_id, extras_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seizoen (id INT AUTO_INCREMENT NOT NULL, omschrijving LONGTEXT NOT NULL, begindatum DATETIME NOT NULL, einddatum DATETIME NOT NULL, korting DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soort (id INT AUTO_INCREMENT NOT NULL, omschrijving LONGTEXT NOT NULL, meerprijs DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A626C74D10 FOREIGN KEY (soortid_id) REFERENCES soort (id)');
        $this->addSql('ALTER TABLE kamer_extras ADD CONSTRAINT FK_2D13C77B78ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kamer_extras ADD CONSTRAINT FK_2D13C77B955D4F3F FOREIGN KEY (extras_id) REFERENCES extras (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kamer_extras DROP FOREIGN KEY FK_2D13C77B955D4F3F');
        $this->addSql('ALTER TABLE kamer_extras DROP FOREIGN KEY FK_2D13C77B78ECB459');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A626C74D10');
        $this->addSql('DROP TABLE betaal');
        $this->addSql('DROP TABLE extras');
        $this->addSql('DROP TABLE kamer');
        $this->addSql('DROP TABLE kamer_extras');
        $this->addSql('DROP TABLE seizoen');
        $this->addSql('DROP TABLE soort');
    }
}
