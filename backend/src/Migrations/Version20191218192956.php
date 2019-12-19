<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218192956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE citations (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, score_cit_id INT DEFAULT NULL, resume LONGTEXT NOT NULL, INDEX IDX_AC492EACF675F31B (author_id), UNIQUE INDEX UNIQ_AC492EAC3507A55C (score_cit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score_cit (id INT AUTO_INCREMENT NOT NULL, point_cit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score_auth (id INT AUTO_INCREMENT NOT NULL, point_auth INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, score_auth_id INT DEFAULT NULL, auth_name VARCHAR(70) NOT NULL, UNIQUE INDEX UNIQ_8E0C2A51E10AA408 (score_auth_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE citations ADD CONSTRAINT FK_AC492EACF675F31B FOREIGN KEY (author_id) REFERENCES authors (id)');
        $this->addSql('ALTER TABLE citations ADD CONSTRAINT FK_AC492EAC3507A55C FOREIGN KEY (score_cit_id) REFERENCES score_cit (id)');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A51E10AA408 FOREIGN KEY (score_auth_id) REFERENCES score_auth (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE citations DROP FOREIGN KEY FK_AC492EAC3507A55C');
        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A51E10AA408');
        $this->addSql('ALTER TABLE citations DROP FOREIGN KEY FK_AC492EACF675F31B');
        $this->addSql('DROP TABLE citations');
        $this->addSql('DROP TABLE score_cit');
        $this->addSql('DROP TABLE score_auth');
        $this->addSql('DROP TABLE authors');
    }
}
