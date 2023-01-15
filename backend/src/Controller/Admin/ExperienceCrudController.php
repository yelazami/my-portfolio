<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Intitulé de poste'),
            TextField::new('period', 'Période'),
            TextField::new('company', 'Nom entreprise'),
            TextField::new('place', 'Lieu'),
            TextEditorField::new('description', 'Description'),
            AssociationField::new('brands'),
            DateField::new('createdAt', 'crée')->onlyOnIndex(),
            DateField::new('updatedAt', 'mis à jour')->onlyOnIndex(),
        ];
    }

}
