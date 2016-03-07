<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); }
if(!$pilotgroups) {
	echo '<br />This user is not in any groups!<br /><br />';
} else {
?>
<table id="tabledlist" class="tablesorter" style="float: left">
<thead>
	<tr>
		<th>Group Name</th>	
		<th>Options</th>
	</tr>
</thead>
<tbody>

<?php 
	foreach($pilotgroups as $group) {
?>
	<tr>
		<td><?php echo $group->name;?></td>
		<td>
			<button href="<?php echo adminaction('/pilotadmin/viewpilots');?>" pilotid="<?php echo $pilotid;?>" 
				action="removegroup" id="<?php echo $group->groupid;?>" 
				class="pilotgroupajax button {button:{icons:{primary:'ui-icon-trash'}}}">Remove</button></td>
	</tr>		
	
<?php
	}
}
?>
</tbody>
</table>
<div style="clear: both;"></div>
<?php
if(PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN) === false) {
	return;
}
?>
<h3>Add to Group</h3>

<?php 
$total = count($freegroups);
if($total == 0) {
	echo 'No groups to add to';
	return;
}
?>
