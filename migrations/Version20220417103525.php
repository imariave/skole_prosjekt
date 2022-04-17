<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417103525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bestilling (id INT AUTO_INCREMENT NOT NULL, navn VARCHAR(100) NOT NULL, epost VARCHAR(100) NOT NULL, addresse LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bestilling_produkt (bestilling_id INT NOT NULL, produkt_id INT NOT NULL, INDEX IDX_35179DDF44D2C323 (bestilling_id), INDEX IDX_35179DDF75F42D9B (produkt_id), PRIMARY KEY(bestilling_id, produkt_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestilling_produkt ADD CONSTRAINT FK_35179DDF44D2C323 FOREIGN KEY (bestilling_id) REFERENCES bestilling (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bestilling_produkt ADD CONSTRAINT FK_35179DDF75F42D9B FOREIGN KEY (produkt_id) REFERENCES produkt (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestilling_produkt DROP FOREIGN KEY FK_35179DDF44D2C323');
        $this->addSql('DROP TABLE bestilling');
        $this->addSql('DROP TABLE bestilling_produkt');
    }
}
