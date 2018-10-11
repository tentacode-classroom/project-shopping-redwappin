<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181010153437 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE toy_mater (toy_id INT NOT NULL, mater_id INT NOT NULL, INDEX IDX_D1E4775EB524FDDC (toy_id), INDEX IDX_D1E4775E9A5AEE8D (mater_id), PRIMARY KEY(toy_id, mater_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE toy_mater ADD CONSTRAINT FK_D1E4775EB524FDDC FOREIGN KEY (toy_id) REFERENCES toy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE toy_mater ADD CONSTRAINT FK_D1E4775E9A5AEE8D FOREIGN KEY (mater_id) REFERENCES mater (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE collection');
        $this->addSql('ALTER TABLE toy ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE toy ADD CONSTRAINT FK_6705A76E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_6705A76E12469DE2 ON toy (category_id)');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE collection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, toys LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE toy_mater');
        $this->addSql('ALTER TABLE toy DROP FOREIGN KEY FK_6705A76E12469DE2');
        $this->addSql('DROP INDEX IDX_6705A76E12469DE2 ON toy');
        $this->addSql('ALTER TABLE toy DROP category_id');
        $this->addSql('ALTER TABLE user DROP roles, CHANGE password password VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
