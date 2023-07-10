<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Romans', null, $manager);
        
        $this->createCategory('Policier', $parent, $manager);
        $this->createCategory('Science-Fiction', $parent, $manager);
        $this->createCategory('Aventure', $parent, $manager);

        $parent = $this->createCategory('BD', null, $manager);

        $this->createCategory('Western', $parent, $manager);
        $this->createCategory('Humoristique', $parent, $manager);
        $this->createCategory('Fantasy', $parent, $manager);
                
        $manager->flush();
    }

    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
