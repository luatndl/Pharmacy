<div class="container clearfix">
<div class="title">
    <p><?php __('Users') ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('NewUser', true), array('action' => 'add')); ?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
            	<td><?php echo $paginator->sort('id');?></td>
            	<td><?php echo $paginator->sort('Username');?></td>
            	<td><?php echo $paginator->sort('Salutation');?></td>
            	<td><?php echo $paginator->sort('FirstName');?></td>
            	<td><?php echo $paginator->sort('LastName');?></td>
            	<td><?php echo $paginator->sort('Address');?></td>
            	<td><?php echo $paginator->sort('Country_id');?></td>
            	<td><?php echo $paginator->sort('Postcode');?></td>
            	<td><?php echo $paginator->sort('Email');?></td>
            	<td><?php echo $paginator->sort('Telephone');?></td>
            	<td><?php echo $paginator->sort('Fax');?></td>
            	<td><?php echo $paginator->sort('MatchMemberSince');?></td>
            	<td><?php echo $paginator->sort('LastLoggedIn');?></td>
            	<td><?php echo $paginator->sort('GPHCNumber');?></td>
            	<td><?php echo $paginator->sort('DateOfPharmacist');?></td>
            	<td><?php echo $paginator->sort('EPS1Ready');?></td>
            	<td><?php echo $paginator->sort('EPS2Ready');?></td>
            	<td><?php echo $paginator->sort('EssentialService');?></td>
            	<td><?php echo $paginator->sort('AdvancedServices');?></td>
            	<td><?php echo $paginator->sort('EnhancedServices');?></td>
            	<td><?php echo $paginator->sort('PatientGroupDirectives');?></td>
            	<td><?php echo $paginator->sort('UserType');?></td>
            	<td><?php echo $paginator->sort('pharmacy_id');?></td>
            	<td class="actions"><?php __('Actions');?></td>
            </tr>
            <?php
            $i = 0;
            foreach ($users as $user):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
            ?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $user['User']['id']; ?>
				</td>
				<td>
					<?php echo $user['User']['Username']; ?>
				</td>
				<td>
					<?php echo $user['User']['Salutation']; ?>
				</td>
				<td>
					<?php echo $user['User']['FirstName']; ?>
				</td>
				<td>
					<?php echo $user['User']['LastName']; ?>
				</td>
				<td>
					<?php echo $user['User']['Address']; ?>
				</td>
				<td>
					<?php echo $user['User']['Country_id']; ?>
				</td>
				<td>
					<?php echo $user['User']['Postcode']; ?>
				</td>
				<td>
					<?php echo $user['User']['Email']; ?>
				</td>
				<td>
					<?php echo $user['User']['Telephone']; ?>
				</td>
				<td>
					<?php echo $user['User']['Fax']; ?>
				</td>
				<td>
					<?php echo $user['User']['MatchMemberSince']; ?>
				</td>
				<td>
					<?php echo $user['User']['LastLoggedIn']; ?>
				</td>
				<td>
					<?php echo $user['User']['GPHCNumber']; ?>
				</td>
				<td>
					<?php echo $user['User']['DateOfPharmacist']; ?>
				</td>
				<td>
					<?php echo $user['User']['EPS1Ready']; ?>
				</td>
				<td>
					<?php echo $user['User']['EPS2Ready']; ?>
				</td>
				<td>
					<?php echo $user['User']['EssentialService']; ?>
				</td>
				<td>
					<?php echo $user['User']['AdvancedServices']; ?>
				</td>
				<td>
					<?php echo $user['User']['EnhancedServices']; ?>
				</td>
				<td>
					<?php echo $user['User']['PatientGroupDirectives']; ?>
				</td>
				<td>
					<?php echo $user['User']['UserType']; ?>
				</td>
				<td>
					<?php echo $user['User']['pharmacy_id']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link($html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', $user['User']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $user['User']['id']), array('escape'=>false), sprintf(__('MsgConfirmDelete', true), $user['User']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
                <tr class="title_table_bottom">
                    <td colspan="24">
                        	<?php echo $paginator->prev('<< '.__('previous', true), array('url'=>$this->params['pass']), null, array('class'=>'disabled','style'=>'display:inline'));?>
                         | 	<?php echo $paginator->numbers(array('url'=>$this->params['pass']));?>
                        	<?php echo $paginator->next(__('next', true).' >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled','style'=>'display:inline'));?>
                    </td>
                </tr>                
            </table>
    </div>
</div>
</div>