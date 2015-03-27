<?php  $this->beginContent('//layouts/main'); ?>
      <div class="row-fluid">
        <div class="span2">
            <!--<div id="sidebar">-->
         <?php
			$box = $this->beginWidget('bootstrap.widgets.TbBox',array(
		        'title' => 'Operaciones',
                        'headerIcon' => 'icon- fa fa-list-alt'));
                                                
			$this->widget('bootstrap.widgets.TbMenu', array(
				'items'=>$this->menu,                                                                  			
                                'type' => 'pills',
                            
				'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
			));                                                                                             
			$this->endWidget();                        
		?>
		<!--</div>--> 
          </div>
          
	<div class="span10">
		<div class="main">
			<?php echo $content; ?>
		</div> 
	</div>
</div>
<?php $this->endContent(); ?>