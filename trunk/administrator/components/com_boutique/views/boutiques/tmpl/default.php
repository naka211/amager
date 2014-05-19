<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JHtml::_('behavior.multiselect');
?>
<form action="index.php?option=com_boutique&controller=boutiques" method="post" name="adminForm" >
    <div id="editcell">
        <table class="adminlist">
        <thead>
            <tr>
            	<th width="1%">
                    <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
                </th>
                <th width="2%" align="center">
                    <?php echo JText::_( '#' ); ?>
                </th>
                <th width="10%">
                    Name
                </th>
                <th width="10%">
                    Information
                </th>
                <th width="20%">
                    Description
                </th>
                <th width="10%">
                    Opening hour
                </th>
                <th width="10%">
                    Sunday opening
                </th>
                <th width="20%">
                    Image
                </th>
            </tr>			
        </thead>
        <?php
        $k = 0;
        for ($i=0, $n=count( $this->boutiques); $i < $n; $i++)
        {	$row = &$this->boutiques[$i];
            $checked 	 = JHTML::_('grid.id',   $i, $row->id );
            $link 		 = JRoute::_( 'index.php?option=com_boutique&controller=boutiques&task=edit&cid[]='. $row->id );
            ?>
            <tr class="<?php echo "row$k"; ?>">
            	<td class="center">
                    <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                </td>
                <td align="center">
                    <?php echo $this->page->getRowOffset( $i ); ?>
                </td>
                <td align="center">
                    <a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
                </td>
                <td align="center">
                    <?php echo $row->information; ?>
                </td>
                <td align="center">
                    <?php echo $row->description; ?>
                </td>
                <td align="center">
                    <?php echo $row->opening; ?>
                </td>
                <td align="center">
                    <?php echo $row->sundayopen; ?>
                </td>
                <td align="center">
                    <?php echo "<img src='".JURI::root(false)."thumbnail/timthumb.php?src=".JURI::root(false)."components/com_boutique/img/".$row->image."&w=200&zc=1' title='".$row->name."' alt='".$row->name."' align='middle' />";?>
                </td>	
			</tr>
            <?php
            $k = 1 - $k;
        }
        ?>
                <tr>
                    <td colspan="9">
                        <?php echo $this->page->getListFooter(); ?>
                    </td>
                </tr>
        </table>
    </div>
    
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
</form>
