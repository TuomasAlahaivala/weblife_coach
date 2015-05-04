<?php
// module/Lifecoach/view/lifecoach/lifecoach/insert_tyotehtavat.phtml

 $title = 'Työtehtavat';
 $this->headTitle($title);
 ?>
 <h1><?php echo $this->escapeHtml($title); ?></h1>
 <?php
 $form->setAttribute('action', $this->url('lifecoach', array('action' => 'insert_tyotehtavat')));
 $form->prepare();

 echo $this->form()->openTag($form);
 echo $this->formHidden($form->get('id_user'));
 echo $this->formRow($form->get('tyotehtava'));
 echo "<br/>";
 echo $this->formRow($form->get('tyoaika'));
 echo "<br/>";
 echo $this->formSubmit($form->get('submit'));
 echo $this->form()->closeTag();