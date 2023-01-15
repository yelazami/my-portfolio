<?php

namespace App\Controller\Admin;

use App\Entity\Work;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class WorkCrudController extends AbstractCrudController
{
    public function __construct(private ParameterBagInterface $param)
    {}

    public static function getEntityFqcn(): string
    {
        return Work::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('projectLink', 'Lien projet'),
            TextField::new('codeLink', 'Lien code'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('imgUrl', 'Image')->setBasePath($this->param->get('portfolio_img'))->onlyOnIndex(),
            ArrayField::new('tags'),
            TextEditorField::new('description', 'Description'),
            DateField::new('createdAt', 'crée')->onlyOnIndex(),
            DateField::new('updatedAt', 'mis à jour')->onlyOnIndex(),
        ];
    }
    
}
