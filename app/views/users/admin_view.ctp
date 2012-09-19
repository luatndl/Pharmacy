<div class="container clearfix">
<div class="title">
    <p><?php __('User');?></p>
        <h6></h6>
        <h5>&nbsp;<?php __('View') ?></h5>
</div>    
<?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('ListUsers', true), array('action' => 'index')); ?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>
            			<tr>
				<td align = 'right'><?php __('Id') ?></td>
				<td align = 'left'><?php echo $user['User']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Username') ?></td>
				<td align = 'left'><?php echo $user['User']['Username']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Salutation') ?></td>
				<td align = 'left'><?php echo $user['User']['Salutation']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('FirstName') ?></td>
				<td align = 'left'><?php echo $user['User']['FirstName']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('LastName') ?></td>
				<td align = 'left'><?php echo $user['User']['LastName']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Address') ?></td>
				<td align = 'left'><?php echo $user['User']['Address']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('CountryId') ?></td>
				<td align = 'left'><?php echo $user['User']['Country_id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Postcode') ?></td>
				<td align = 'left'><?php echo $user['User']['Postcode']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Email') ?></td>
				<td align = 'left'><?php echo $user['User']['Email']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Telephone') ?></td>
				<td align = 'left'><?php echo $user['User']['Telephone']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Fax') ?></td>
				<td align = 'left'><?php echo $user['User']['Fax']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('MatchMemberSince') ?></td>
				<td align = 'left'><?php echo $user['User']['MatchMemberSince']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('LastLoggedIn') ?></td>
				<td align = 'left'><?php echo $user['User']['LastLoggedIn']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('GPHCNumber') ?></td>
				<td align = 'left'><?php echo $user['User']['GPHCNumber']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('DateOfPharmacist') ?></td>
				<td align = 'left'><?php echo $user['User']['DateOfPharmacist']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('EPS1Ready') ?></td>
				<td align = 'left'><?php echo $user['User']['EPS1Ready']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('EPS2Ready') ?></td>
				<td align = 'left'><?php echo $user['User']['EPS2Ready']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('EssentialService') ?></td>
				<td align = 'left'><?php echo $user['User']['EssentialService']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('AdvancedServices') ?></td>
				<td align = 'left'><?php echo $user['User']['AdvancedServices']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('EnhancedServices') ?></td>
				<td align = 'left'><?php echo $user['User']['EnhancedServices']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('PatientGroupDirectives') ?></td>
				<td align = 'left'><?php echo $user['User']['PatientGroupDirectives']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('UserType') ?></td>
				<td align = 'left'><?php echo $user['User']['UserType']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('PharmacyId') ?></td>
				<td align = 'left'><?php echo $user['User']['pharmacy_id']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>