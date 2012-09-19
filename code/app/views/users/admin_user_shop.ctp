     
<div class="container clearfix">
<div class="title">
    <p><?php __("Shop User List") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("UserShops") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>            
            <?php echo $html->link(__('UserShopList',true),array('action'=>'shopuserlist'));  ?>
        </p>
        <div class="search">            
            <?php echo $form->create('User',array('action'=>'add_shop')) ?>
                <input type="hidden" name = "data[UserID]" value="<?php echo $this->params['pass'][0] ?>" />
                <?php __("ShopName") ?>
                <input type="text" name = "data[ShopName]" />
                
                <?php __("Grade") ?>
                <select name="data[GradeID]">                
                <?php foreach($shopGrade as $key => $text): ?>
                <option value="<?php echo $key ?>"><?php echo $text ?></option>
                <?php endforeach; ?>                
                </select>
                
                <?php __("Genre") ?>
                <select name="data[GenreID]">                
                <?php foreach($genres as $key => $text): ?>
                <option value="<?php echo $key ?>"><?php echo $text ?></option>
                <?php endforeach; ?>                
                </select>
                
                <input type="submit" value="<?php __("Add") ?>" class="btn2" />
            </form>
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php if(isset($shops) && count($shops) > 0): ?>
        <table>
            <tr class="title_table">
                <td><?php __("ID") ?></td>
                <td><?php __("Name") ?></td>
                <td><?php __("Grade") ?></td>
                <td><?php __("Genre") ?></td>
                <td><?php __("Actions") ?></td>
            </tr>
        <?php foreach($shops as $item): ?>
            <tr>
                <td><?php echo $item['Shop']['id'] ?></td>
                <td><?php echo $item['Shop']['name'] ?></td>
                <td><?php echo $shopGrade[$item['Shop']['grade']] ?></td>
                <td><?php echo $genres[$item['Shop']['genre_id']] ?></td>
                <td>
                    <?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('controller'=>'shops' ,'action' => 'edit', $item['Shop']['id'],$this->params['pass'][0]),array('escape'=>false)); ?>
                    <?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('controller'=>'shops','action' => 'delete', $item['Shop']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $item['Shop']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td class="title_table_bottom" colspan="5"></td>                
            </tr>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>