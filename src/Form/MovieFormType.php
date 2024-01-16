<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none',
                'placeholder' => 'Enter title...'
            ), 
            'label'=> false

                
            ])
            ->add('releaseYear', IntegerType::class,[
                'attr'=> array(
                    'class'=>'bg-transparent block mt-10 border-b-2 w-full h-20 text-6xl outline-none',
                    'placeholder' => 'Enter release year...'
                ), 
                'label'=> false
    
                    
                ])
            ->add('description', TextareaType::class,[
                'attr'=> array(
                    'class'=>'bg-transparent block mt-10 border-b-2 w-full h-50 text-6xl outline-none',
                    'placeholder' => 'Enter description...'
                ), 
                'label'=> false
    
                    
                ])
         ->add('imagepath', FileType::class, array(
        'required' => false,
        'mapped' =>false
                ))


           /* ->add('imagePath', FileType::class,[
                'attr'=> array(
                    'class'=>'py-10'
                ), 
                'label'=> false
    
                    
                ])*/
            ->add('actors', EntityType::class, [
                'class' => Actor::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}