<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612091448 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, kamerid_id INT NOT NULL, imagefile VARCHAR(255) NOT NULL, INDEX IDX_C53D045FEC7911BE (kamerid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservering (id INT AUTO_INCREMENT NOT NULL, kamerid_id INT NOT NULL, userid_id INT NOT NULL, betaalid_id INT NOT NULL, checkingdate DATETIME NOT NULL, checkoutdate DATETIME NOT NULL, betaalmethode VARCHAR(255) NOT NULL, INDEX IDX_F2E439ACEC7911BE (kamerid_id), INDEX IDX_F2E439AC58E0A285 (userid_id), UNIQUE INDEX UNIQ_F2E439ACE6E82E7 (betaalid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FEC7911BE FOREIGN KEY (kamerid_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439ACEC7911BE FOREIGN KEY (kamerid_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439AC58E0A285 FOREIGN KEY (userid_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439ACE6E82E7 FOREIGN KEY (betaalid_id) REFERENCES betaal (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE reservering');
    }
}
