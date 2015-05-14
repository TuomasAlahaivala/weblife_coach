<?php
// module/Lifecoach/view/lifecoach/lifecoach/insert_vapaa.phtml

 $title = 'Vapaa-aika';
 $this->headTitle($title);
 ?>
 <h1><?php echo $this->escapeHtml($title); ?></h1>
 <?php
 $form->setAttribute('action', $this->url('lifecoach', array('action' => 'insert_vapaa')));
 $form->prepare();

 echo $this->form()->openTag($form);
 echo $this->formHidden($form->get('id_user'));
 echo $this->formRow($form->get('suunnittelu'));
 echo "<br/>";
 echo $this->formRow($form->get('siivous'));
 echo "<br/>";
 echo $this->formRow($form->get('sauna'));
 echo "<br/>";
 echo $this->formRow($form->get('kauppa'));
 echo "<br/>";
 echo $this->formRow($form->get('liikunta'));
 echo "<br/>";
 echo $this->formRow($form->get('viihde'));
 echo "<br/>";
 echo $this->formRow($form->get('muuta'));
 echo "<br/>";
 echo $this->formSubmit($form->get('submit'));
 echo $this->form()->closeTag();