<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209175047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE army (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE army_figurine (army_id INT NOT NULL, figurine_id INT NOT NULL, INDEX IDX_44681AE918D2742D (army_id), INDEX IDX_44681AE9C550FC1B (figurine_id), PRIMARY KEY(army_id, figurine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurine (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, faction_id INT NOT NULL, stats_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, points INT NOT NULL, UNIQUE INDEX UNIQ_9DD64783DA5256D (image_id), INDEX IDX_9DD64784448F8DA (faction_id), UNIQUE INDEX UNIQ_9DD647870AA3482 (stats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurine_paint (figurine_id INT NOT NULL, paint_id INT NOT NULL, INDEX IDX_8D6E6C61C550FC1B (figurine_id), INDEX IDX_8D6E6C619017B5FF (paint_id), PRIMARY KEY(figurine_id, paint_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurine_gun (figurine_id INT NOT NULL, gun_id INT NOT NULL, INDEX IDX_ABEF34D8C550FC1B (figurine_id), INDEX IDX_ABEF34D8D7F86DEC (gun_id), PRIMARY KEY(figurine_id, gun_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurine_melee_weapon (figurine_id INT NOT NULL, melee_weapon_id INT NOT NULL, INDEX IDX_DC59463C550FC1B (figurine_id), INDEX IDX_DC594635F087C93 (melee_weapon_id), PRIMARY KEY(figurine_id, melee_weapon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurine_stats (id INT AUTO_INCREMENT NOT NULL, movement INT NOT NULL, toughness INT NOT NULL, save INT NOT NULL, wound INT NOT NULL, leadership INT NOT NULL, oc INT NOT NULL, min_model INT NOT NULL, max_models INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gun (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, weapon_range INT NOT NULL, number_of_attacks VARCHAR(255) NOT NULL, ballistic_skill INT DEFAULT NULL, strenght INT NOT NULL, armor_penetration INT NOT NULL, damage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE melee_weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, number_of_attacks INT NOT NULL, weapon_skill INT NOT NULL, strenght INT NOT NULL, armor_penetration INT NOT NULL, damage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paint (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE army_figurine ADD CONSTRAINT FK_44681AE918D2742D FOREIGN KEY (army_id) REFERENCES army (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE army_figurine ADD CONSTRAINT FK_44681AE9C550FC1B FOREIGN KEY (figurine_id) REFERENCES figurine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine ADD CONSTRAINT FK_9DD64783DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE figurine ADD CONSTRAINT FK_9DD64784448F8DA FOREIGN KEY (faction_id) REFERENCES faction (id)');
        $this->addSql('ALTER TABLE figurine ADD CONSTRAINT FK_9DD647870AA3482 FOREIGN KEY (stats_id) REFERENCES figurine_stats (id)');
        $this->addSql('ALTER TABLE figurine_paint ADD CONSTRAINT FK_8D6E6C61C550FC1B FOREIGN KEY (figurine_id) REFERENCES figurine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine_paint ADD CONSTRAINT FK_8D6E6C619017B5FF FOREIGN KEY (paint_id) REFERENCES paint (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine_gun ADD CONSTRAINT FK_ABEF34D8C550FC1B FOREIGN KEY (figurine_id) REFERENCES figurine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine_gun ADD CONSTRAINT FK_ABEF34D8D7F86DEC FOREIGN KEY (gun_id) REFERENCES gun (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine_melee_weapon ADD CONSTRAINT FK_DC59463C550FC1B FOREIGN KEY (figurine_id) REFERENCES figurine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurine_melee_weapon ADD CONSTRAINT FK_DC594635F087C93 FOREIGN KEY (melee_weapon_id) REFERENCES melee_weapon (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE army_figurine DROP FOREIGN KEY FK_44681AE918D2742D');
        $this->addSql('ALTER TABLE army_figurine DROP FOREIGN KEY FK_44681AE9C550FC1B');
        $this->addSql('ALTER TABLE figurine DROP FOREIGN KEY FK_9DD64783DA5256D');
        $this->addSql('ALTER TABLE figurine DROP FOREIGN KEY FK_9DD64784448F8DA');
        $this->addSql('ALTER TABLE figurine DROP FOREIGN KEY FK_9DD647870AA3482');
        $this->addSql('ALTER TABLE figurine_paint DROP FOREIGN KEY FK_8D6E6C61C550FC1B');
        $this->addSql('ALTER TABLE figurine_paint DROP FOREIGN KEY FK_8D6E6C619017B5FF');
        $this->addSql('ALTER TABLE figurine_gun DROP FOREIGN KEY FK_ABEF34D8C550FC1B');
        $this->addSql('ALTER TABLE figurine_gun DROP FOREIGN KEY FK_ABEF34D8D7F86DEC');
        $this->addSql('ALTER TABLE figurine_melee_weapon DROP FOREIGN KEY FK_DC59463C550FC1B');
        $this->addSql('ALTER TABLE figurine_melee_weapon DROP FOREIGN KEY FK_DC594635F087C93');
        $this->addSql('DROP TABLE army');
        $this->addSql('DROP TABLE army_figurine');
        $this->addSql('DROP TABLE faction');
        $this->addSql('DROP TABLE figurine');
        $this->addSql('DROP TABLE figurine_paint');
        $this->addSql('DROP TABLE figurine_gun');
        $this->addSql('DROP TABLE figurine_melee_weapon');
        $this->addSql('DROP TABLE figurine_stats');
        $this->addSql('DROP TABLE gun');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE melee_weapon');
        $this->addSql('DROP TABLE paint');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
