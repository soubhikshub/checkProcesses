<?php

$processName="all";

if(isset($_REQUEST['pn'])){
	$processName=$_REQUEST['pn'];
}

print_r(checkProcesses($processName));

function checkProcesses($processName){
	exec("tasklist 2>NUL", $task_list);
	
	// if all the processes needs to be returned
	
	if($processName=="all"){return $task_list;}
	else{
		
		// to check if the input process name is running in the server
		
		foreach ($task_list as $task){
			$processDetail=explode(" ",$task);
			$returnProcessDetail="";
			if($processName==$processDetail[0]){
				foreach ($processDetail as $detail){
					if($detail!=""){ // removing all the blank spaces
						$returnProcessDetail.=$detail.";";
					}
				}
				echo $returnProcessDetail;
				
			}
		}
	}
	
	
	//print_r($task_list);
}
?>
