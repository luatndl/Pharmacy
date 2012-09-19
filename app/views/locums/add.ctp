<div class="container clearfix">
<div class="title">
    <p><?php __('User');?></p>
        <h6></h6>
        <h5>&nbsp;<?php __('Add');?></h5>
</div>    
 <?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('ListUsers', true), array('action' => 'index'));?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('User');?>
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>

            			<tr>
				<td align='right'><?php __('Username') ?></td>
				<td align='left'><?php echo $form->input('Username',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Salutation') ?></td>
				<td align='left'><?php echo $form->input('Salutation',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('FirstName') ?></td>
				<td align='left'><?php echo $form->input('FirstName',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('LastName') ?></td>
				<td align='left'><?php echo $form->input('LastName',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Address') ?></td>
				<td align='left'><?php echo $form->input('Address',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('CountryId') ?></td>
				<td align='left'><?php echo $form->input('Country_id',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Postcode') ?></td>
				<td align='left'><?php echo $form->input('Postcode',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Email') ?></td>
				<td align='left'><?php echo $form->input('Email',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Telephone') ?></td>
				<td align='left'><?php echo $form->input('Telephone',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('Fax') ?></td>
				<td align='left'><?php echo $form->input('Fax',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('MatchMemberSince') ?></td>
				<td align='left'><?php echo $form->input('MatchMemberSince',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('LastLoggedIn') ?></td>
				<td align='left'><?php echo $form->input('LastLoggedIn',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('GPHCNumber') ?></td>
				<td align='left'><?php echo $form->input('GPHCNumber',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('DateOfPharmacist') ?></td>
				<td align='left'><?php echo $form->input('DateOfPharmacist',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('EPS1Ready') ?></td>
				<td align='left'><?php echo $form->input('EPS1Ready',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('EPS2Ready') ?></td>
				<td align='left'><?php echo $form->input('EPS2Ready',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('EssentialService') ?></td>
				<td align='left'><?php echo $form->input('EssentialService',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('AdvancedServices') ?></td>
				<td align='left'><?php echo $form->input('AdvancedServices',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('EnhancedServices') ?></td>
				<td align='left'><?php echo $form->input('EnhancedServices',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('PatientGroupDirectives') ?></td>
				<td align='left'><?php echo $form->input('PatientGroupDirectives',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('UserType') ?></td>
				<td align='left'><?php echo $form->input('UserType',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('PharmacyId') ?></td>
				<td align='left'><?php echo $form->input('pharmacy_id',array('label'=>'','div'=>'')); ?></td>
			</tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="submit" value="Submit" class="btn" />                    
                    <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/admin/users'); ?>';" value="<?php __("Back") ?>" />
                </td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>