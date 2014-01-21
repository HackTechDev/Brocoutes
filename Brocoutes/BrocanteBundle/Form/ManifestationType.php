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
            ->add('adresse', null, array('label' => 'Adresse : '))
            ->add('adressecomplement', null, array('label' => 'Complement adresse : '))
            ->add('ville', null, array('label' => 'Ville : '))
            ->add('departement', null, array('label' => 'Departement : '))
            ->add('codepostal', null, array('label' => 'Code postal : '))
            ->add('latitude', null, array('label' => 'Latitude : '))
            ->add('longitude', null, array('label' => 'Longitude : '))
            ->add('dateouverture', 'date', array('label' => 'Date ouverture : ', 'format' => 'dd/MM/yyyy HH:mm'))
            ->add('datefermeture', 'date', array('label' => 'Date fermeture : ', 'format' => 'dd/MM/yyyy HH:mm'))
            ->add('organisateur', null, array('label' => 'Organisateur : '))
            ->add('telephone', null, array('label' => 'Telephone : '))
            ->add('courriel', null, array('label' => 'Courriel : '))
            ->add('site', null, array('label' => 'Site : '))
            ->add('stand', null, array('label' => 'Nombre de stand : '))
            ->add('prixentree', null, array('label' => 'Prix entrée : '))
            ->add('information', null, array('label' => 'Information : '))
            ->add('affiche', null, array('label' => 'Affiche : '))
            ->add('exposant', null, array('label' => 'Type exposant : '))
            ->add('creation', 'date', array('label' => 'Date publication : ', 'format' => 'dd/MM/yyyy HH:mm'))
            ->add('miseajour', 'date', array('label' => 'Date de derniere mise-a-jour : ', 'format' => 'dd/MM/yyyy HH:mm'))
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
