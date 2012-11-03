<?php

namespace Clamz\CheminDuSon\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoordonneesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse1',"text",array('required'=>false))
            ->add('adresse2',"text",array('required'=>false))
            ->add('telephone',"text",array('required'=>false))
            ->add('ville',"text",array('required'=>false))
            ->add('departement',"text",array('required'=>false))
            ->add('region',"text",array('required'=>false))
            ->add('zipcode','text',array("label"=>"form.coordonnees.zipcode.label", 'translation_domain' => 'userbundle-form'))
            ->add('pays',"text",array('required'=>false))
            ->add('isPrivate',"checkbox",array('label' => 'form.coordonnees.isprivate.label', 'translation_domain' => 'userbundle-form', 'required' => false))
            ->add('userId','hidden', array('mapped' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees'
        ));
    }

    public function getName()
    {
        return 'clamz_cds_form_coordonneestype';
    }
}
