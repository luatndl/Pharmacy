<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<div class="container clearfix">
<div class="title">
    <p><?php echo "<?php __('{$pluralHumanName}') ?>" ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php echo "<?php \$session->flash(); ?>"; ?>

<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo "<?php echo \$html->link(__('New{$singularHumanName}', true), array('action' => 'add')); ?>";?>
        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
            <?php  foreach ($fields as $field):?>
<?php echo "\t" ?><td><?php echo "<?php echo \$paginator->sort('{$field}');?>";?></td>
            <?php endforeach;?>
<?php echo "\t" ?><td class="actions"><?php echo "<?php __('Actions');?>";?></td>
            </tr>
            <?php
            echo "<?php
            \$i = 0;
            foreach (\${$pluralVar} as \${$singularVar}):
                \$class = null;
                if (\$i++ % 2 == 0) {
                    \$class = ' class=\"altrow\"';
                }
            ?>\n";
                echo "\t\t\t<tr<?php echo \$class;?>>\n";
                    foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
                                    echo "\t\t\t\t<td>\n\t\t\t<?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            echo "\t\t\t\t<td>\n\t\t\t\t\t<?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>\n\t\t\t\t</td>\n";
                        }
                    }

                    echo "\t\t\t\t<td class=\"actions\">\n";
                    echo "\t\t\t\t\t<?php echo \$html->link(\$html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
                     echo "\t\t\t\t\t<?php echo \$html->link(\$html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
                     echo "\t\t\t\t\t<?php echo \$html->link(\$html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false), sprintf(__('MsgConfirmDelete', true), \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                    echo "\t\t\t\t</td>\n";
                echo "\t\t\t</tr>\n";

            echo "\t\t\t<?php endforeach; ?>\n";
            ?>
                <tr class="title_table_bottom">
                    <td colspan="<?php echo count($fields)+1; ?>">
                        <?php echo "\t<?php echo \$paginator->prev('<< '.__('previous', true), array('url'=>\$this->params['pass']), null, array('class'=>'disabled','style'=>'display:inline'));?>\n";?>
                         | <?php echo "\t<?php echo \$paginator->numbers(array('url'=>\$this->params['pass']));?>\n"?>
                        <?php echo "\t<?php echo \$paginator->next(__('next', true).' >>', array('url'=>\$this->params['pass']), null, array('class' => 'disabled','style'=>'display:inline'));?>\n";?>
                    </td>
                </tr>                
            </table>
    </div>
</div>
</div>