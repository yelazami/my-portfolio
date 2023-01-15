<?php

namespace App\Controller\Admin;

use App\Entity\Brands;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BrandsCrudController extends AbstractCrudController
{
    public function __construct(private ParameterBagInterface $param)
    {}

    public static function getEntityFqcn(): string
    {
        return Brands::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('imgUrl', 'Image')->setBasePath($this->param->get('portfolio_img'))->onlyOnIndex(),
            AssociationField::new('experiences', 'Experiences')->setFormTypeOptions(['by_reference' => false]),
            DateField::new('createdAt', 'crée')->onlyOnIndex(),
            DateField::new('updatedAt', 'mis à jour')->onlyOnIndex(),
        ];
    }

}
