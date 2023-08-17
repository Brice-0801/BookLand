<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('categories')->autocomplete(),
            TextField::new('name'),
            TextField::new('slug'),
            TextEditorField::new('description'),
            NumberField::new('price'),
            NumberField::new('stock'),
            DateTimeField::new('created_at'),
            CollectionField::new('images')->useEntryCrudForm(ImagesCrudController::class)->setRequired(true)
        ];
    }
}