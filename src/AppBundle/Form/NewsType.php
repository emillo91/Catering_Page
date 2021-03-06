<?php
/**
 * Created by PhpStorm.
 * User: E
 * Date: 10.09.2018
 * Time: 11:22
 */

namespace AppBundle\Form;


use AppBundle\Entity\News;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("newstitle", TextType::class, ["label" => "Tytuł wydrzenia"])
            ->add("newsdescription", TextareaType::class, ["label" => "Opis wydarzenia"])
            ->add("imageid", EntityType::class, [
                'class' => 'AppBundle:Images',
                'choice_label' => 'imgname',
                'label' => 'Wybierz zdjęcie',
            ])
            ->add("submit", SubmitType::class, ["label" => "Zapisz"]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                "data_class" => News::class
            ]
        );
    }
}