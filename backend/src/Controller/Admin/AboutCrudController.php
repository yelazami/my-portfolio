<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AboutCrudController extends AbstractCrudController
{
    /**
     * Undocumented function
     *
     * @param ParameterBagInterface $param
     */
    public function __construct(private ParameterBagInterface $param)
    {}

    public static function getEntityFqcn(): string
    {
        return About::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextEditorField::new('description', 'Description'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('imgUrl', 'Image')->setBasePath($this->param->get('portfolio_img'))->onlyOnIndex(),
            DateField::new('createdAt', 'crée')->onlyOnIndex(),
            DateField::new('updatedAt', 'mis à jour')->onlyOnIndex(),
        ];
    }

}
