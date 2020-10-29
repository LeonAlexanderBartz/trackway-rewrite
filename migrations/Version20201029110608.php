<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029110608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absence_reasons (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE absences (id INT AUTO_INCREMENT NOT NULL, reason_id INT DEFAULT NULL, team_id INT DEFAULT NULL, user_id INT DEFAULT NULL, note VARCHAR(255) NOT NULL, date DATE NOT NULL, ends_at TIME NOT NULL, starts_at TIME NOT NULL, INDEX IDX_F9C0EFFF59BB1592 (reason_id), INDEX IDX_F9C0EFFF296CD8AE (team_id), INDEX IDX_F9C0EFFFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitation_status (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_3705BED6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitations (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, user_id INT DEFAULT NULL, status_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, INDEX IDX_232710AE296CD8AE (team_id), INDEX IDX_232710AEA76ED395 (user_id), INDEX IDX_232710AE6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locale (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membership (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, user_id INT DEFAULT NULL, group_id INT DEFAULT NULL, INDEX IDX_86FFD285296CD8AE (team_id), INDEX IDX_86FFD285A76ED395 (user_id), INDEX IDX_86FFD285FE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, cost_center VARCHAR(255) DEFAULT NULL, INDEX IDX_5C93B3A4296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_entries (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, team_id INT DEFAULT NULL, user_id INT DEFAULT NULL, note VARCHAR(255) NOT NULL, date DATE NOT NULL, ends_at TIME NOT NULL, starts_at TIME NOT NULL, INDEX IDX_797F12A3166D1F9C (project_id), INDEX IDX_797F12A3296CD8AE (team_id), INDEX IDX_797F12A3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, locale_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, enabled  TINYINT(1) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, registration_requested_at DATETIME DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', activeTeam_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E9E559DFD1 (locale_id), INDEX IDX_1483A5E980DBDFA6 (activeTeam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF59BB1592 FOREIGN KEY (reason_id) REFERENCES absence_reasons (id)');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFFA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invitation_status ADD CONSTRAINT FK_3705BED6A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invitations ADD CONSTRAINT FK_232710AE296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE invitations ADD CONSTRAINT FK_232710AEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invitations ADD CONSTRAINT FK_232710AE6BF700BD FOREIGN KEY (status_id) REFERENCES invitation_status (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE time_entries ADD CONSTRAINT FK_797F12A3166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE time_entries ADD CONSTRAINT FK_797F12A3296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE time_entries ADD CONSTRAINT FK_797F12A3A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9E559DFD1 FOREIGN KEY (locale_id) REFERENCES locale (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E980DBDFA6 FOREIGN KEY (activeTeam_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF59BB1592');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD285FE54D947');
        $this->addSql('ALTER TABLE invitations DROP FOREIGN KEY FK_232710AE6BF700BD');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9E559DFD1');
        $this->addSql('ALTER TABLE time_entries DROP FOREIGN KEY FK_797F12A3166D1F9C');
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF296CD8AE');
        $this->addSql('ALTER TABLE invitations DROP FOREIGN KEY FK_232710AE296CD8AE');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD285296CD8AE');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4296CD8AE');
        $this->addSql('ALTER TABLE time_entries DROP FOREIGN KEY FK_797F12A3296CD8AE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E980DBDFA6');
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFFA76ED395');
        $this->addSql('ALTER TABLE invitation_status DROP FOREIGN KEY FK_3705BED6A76ED395');
        $this->addSql('ALTER TABLE invitations DROP FOREIGN KEY FK_232710AEA76ED395');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD285A76ED395');
        $this->addSql('ALTER TABLE time_entries DROP FOREIGN KEY FK_797F12A3A76ED395');
        $this->addSql('DROP TABLE absence_reasons');
        $this->addSql('DROP TABLE absences');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE invitation_status');
        $this->addSql('DROP TABLE invitations');
        $this->addSql('DROP TABLE locale');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE time_entries');
        $this->addSql('DROP TABLE users');
    }
}
