<?php

namespace Clamz\CheminDuSon\BandBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nationality')
            ->add('image')
            ->add('presentation')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clamz\CheminDuSon\BandBundle\Entity\Band'
        ));
    }

    public function getName()
    {
        return 'clamz_cheminduson_bandbundle_bandtype';
    }
}
