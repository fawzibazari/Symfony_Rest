<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103153329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE test_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_test_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE test (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_test (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A2FE32C5E7927C74 ON user_test (email)');
        $this->addSql('ALTER TABLE "user" ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP validated');
        $this->addSql('ALTER TABLE "user" DROP nbroftasks');
        $this->addSql('ALTER TABLE "user" DROP created_at');
        $this->addSql('ALTER TABLE "user" DROP last_connexion');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(180)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE test_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_test_id_seq CASCADE');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user_test');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('ALTER TABLE "user" ADD validated BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD nbroftasks INT NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD last_connexion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP roles');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(255)');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
    }
}
