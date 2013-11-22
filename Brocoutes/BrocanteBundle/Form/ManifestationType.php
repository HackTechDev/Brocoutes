<?php

namespace Brocoutes\BrocanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ManifestationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('label' => 'Nom : '))
            ->add('lieu', null, array('label' => 'Lieu : '))
            ->add('date', 'date', array('label' => 'Date : ', 'format' => 'dd/MM/yyyy'))
            ->add('latitude', null, array('label' => 'Latitude : '))
            ->add('longitude', null, array('label' => 'Longitude : '))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brocoutes\BrocanteBundle\Entity\Manifestation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'brocoutes_brocantebundle_manifestation';
    }
}
