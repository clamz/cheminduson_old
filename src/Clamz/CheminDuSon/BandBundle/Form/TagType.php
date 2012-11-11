<?php

namespace Clamz\CheminDuSon\BandBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clamz\CheminDuSon\BandBundle\Entity\Tag'
        ));
    }

    public function getName()
    {
        return 'clamz_cheminduson_bandbundle_tagtype';
    }
}
