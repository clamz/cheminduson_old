<?php

namespace Clamz\CheminDuSon\ConcertBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcertType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
				->add('name', null,
						array("label" => "form.concert.name.label",
								'translation_domain' => 'concertbundle-form'))
				->add('date', 'datetime',
						array("label" => "form.concert.date.label",
								'translation_domain' => 'concertbundle-form'))
				->add('description', 'textarea',
						array("label" => "form.concert.description.label",
								'translation_domain' => 'concertbundle-form',
								'attr' => array('class'=>'ckeditor')))
				->add('price', 'integer',
						array("label" => "form.concert.price.label",
								'translation_domain' => 'concertbundle-form'));
				
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver
				->setDefaults(
						array(
								'data_class' => 'Clamz\CheminDuSon\ConcertBundle\Entity\Concert'));
	}

	public function getName() {
		return 'clamz_cheminduson_concertbundle_concerttype';
	}
}
