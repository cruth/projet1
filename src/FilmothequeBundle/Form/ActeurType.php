<?php

namespace FilmothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$years = [];
		for($i=1902;$i<(int)date('Y');$i++) { $years[] = $i; }
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance', 'date', ['years'=>$years])
            ->add('sexe')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FilmothequeBundle\Entity\Acteur'
        ));
    }
}
